@extends('admin.post.layout')

@section('content')
	<h2>Create Post</h2>
	<form method="POST" action="{{ route('admin.post.store') }}">
		@csrf
		<label>Title</label>
		<input type="text" name="title" /><br>
		<label>Content</label>
		<textarea id="tinymce" name="content"></textarea><br>
		<input type="submit" value="create"/>
	</form>
@endsection