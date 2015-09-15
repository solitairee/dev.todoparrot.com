@extends('layouts.master')

@section('content')

<h1>{{ $list->name }}</h1>

<p>
	Created on: {{ $list->created_at }}<br />
	Last Modified: {{ $list->updated_at }}
</p>

<p>
	{{ $list->description }}
</p>

{!! Form::open(array('route' => array('lists.destroy', $list->id), 'method' => 'delete')) !!}
	<button type="submit">Delete List</button>
{!! Form::close() !!}
<h2>Tasks</h2>

@if( $list->tasks->count() > 0 )
	<ul>
		@foreach($list->tasks as $task)
			<li> {{$task->name}} </li>
		@endforeach
	</ul>
@else
	<p>
		You haven't created any tasks.
		<a href="#" class="btn btn-primary">Create a task</a>
	</p>
@endif
@endsection