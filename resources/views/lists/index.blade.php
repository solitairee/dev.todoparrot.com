@extends('layouts.master')

@section('content')

<h1>Lists</h1>

@if( $lists->count() > 0 )
	<table>
		<th>Name</th>
		<th>Description</th>
		@foreach ($lists as $list)
			<tr>
				<td>{{ $list->name }}</td>
				<td>{{ $list->description }}</td>
			</tr>
		@endforeach
	</table>
@else
	<p>
		No list found!
	</p>
@endif

{!! $lists->render() !!}

@endsection