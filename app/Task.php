<?php

namespace todoparrot;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function todolist()
    {
    	return $this->belongsTo('todoparrot\Todolist');
    }
}
