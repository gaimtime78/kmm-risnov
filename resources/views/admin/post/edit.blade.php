@extends('admin.post.layout')

@section('content')
	<h2>initate retreat EDITTT COKKK</h2>
	<form method="POST" action="{{ route('admin.post.update', ['id' => $data->id]) }}">
		@csrf
		@method('put')
		<label>Title</label>
		<input type="text" name="title" value="{{ $data->title }}"/><br>
		<label>Content</label>
		<textarea name="content">{{ $data->content }}</textarea><br>
		<input type="submit" value="update"/>
	</form>
	<form method="POST" action="{{ route('admin.post.delete', ['id' => $data->id]) }}">
		@csrf
		@method('delete')
		<input type="submit" value="delete"/>
	</form>
@endsection