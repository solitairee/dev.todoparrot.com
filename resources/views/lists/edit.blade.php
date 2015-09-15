@extends('layouts.master')

@section('content')

<h1>Create a New List</h1>

<ul>
	@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
	@endforeach
</ul>

{!! Form::model($list, 
	array('method' => 'put',
		'route' => ['lists.update', $list->id], 
		'class' => 'form')) !!}

<div class="form-group">
	{!! Form::label('List Name') !!}
	{!! Form::text('name', null,
	array('required', 'class'=>'form-control',
	'placeholder'=>'San Juan Vacation')) !!}
</div>

<div class="form-group">
	{!! Form::label('List Description') !!}
	{!! Form::textarea('description', null,
		array('required', 'class'=>'form-control',
		'placeholder'=>'Things to do before leaving for vacation')) !!}
</div>

<div class="form-group">
	{!! Form::label('Categories') !!}
	{!! Form::select('categories', $categories, null,
		array('multiple'=>'multiple','name'=>'categories[]')) !!}
</div>

<div class="form-group">
	{!! Form::submit('Create List', array('class'=>'btn btn-primary')) !!}
</div>
{!! Form::close() !!}

@stop