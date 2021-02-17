@extends('admin.post.layout')

@section('content')
	<h2>Category Post</h2>
	<table>
		<tr>
			<th>id</th>
			<th>title</th>
			<th>content</th>
			<th>user</th>
			<th>category</th>
			<th>created_at</th>
			<th>updated_at</th>
			<th>Action</th>
		</tr>
		@foreach($data as $row)
		<tr>
			<td>{{ $row->id }}</td>
			<td>{{ $row->title }}</td>
			<td>{!! $row->content !!}</td>
			<td>{{ $row->user_id }}</td>
			<td>{{ $row->category_id }}</td>
			<td>{{ $row->created_at }}</td>
			<td>{{ $row->updated_at }}</td>
			<td>
				<div>
					<a href="{{ route('admin.post.edit', ['id' => $row->id]) }}">Edit</a>
				</div>
			</td>
		</tr>
		@endforeach
	</table>
@endsection