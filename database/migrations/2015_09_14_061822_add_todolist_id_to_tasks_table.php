<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTodolistIdToTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->integer('todolist_id')->unsigned();
            $table->foreign('todolist_id')->references('id')
                ->on('todolists')
                ->onDelete('cascade');
            $table->string('name');
            $table->text('description');
            $table->boolean('done')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn('todolist_id');
            $table->dropColumn('name');
            $table->dropColumn('description');
            $table->dropColumn('done');
        });
    }
}
