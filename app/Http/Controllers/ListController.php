<?php

namespace todoparrot\Http\Controllers;

use Illuminate\Http\Request;

use todoparrot\Http\Requests;
use todoparrot\Http\Controllers\Controller;

use todoparrot\Todolist;
use todoparrot\Category;
use todoparrot\Http\Requests\ListFormRequest;

class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $lists = Todolist::orderBy('name')->paginate(10);
        return view('lists.index')->with('lists', $lists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::lists('name', 'id');
        return view('lists.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(ListFormRequest $request)
    {
        $list = new Todolist(array(
                'name' => $request->get('name'),
                'description' => $request->get('description')
            ));

        $list->save();

        if(count($request->get('categories')) > 0)
        {
            $list->categories()->attach($request->get('categories'));
        }

        return \Redirect::route('lists.create')->with('message', 'Your List 
            has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $list = Todolist::findOrFail($id);
        return view('lists.show')->with('list', $list);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $categories = Category::lists('name', 'id');
        $list = Todolist::find($id);

        return view('lists.edit')->with('list', $list)
            ->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(ListFormRequest $request, $id)
    {
        $list = Todolist::find($id);

        $list->update([
            'name' => $request->get('name'),
            'description' => $request->get('description')
            ]);

        if(count($request->get('categories')) > 0)
        {
            $list->categories()->sync($request->get('categories'));
        }

        return \Redirect::route('lists.edit',
            array($list->id))->with('message', 'Your list has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Todolist::destroy($id);

        return \Redirect::route('lists.index')
            ->with('message', 'The list has been deleted!');
    }
}
