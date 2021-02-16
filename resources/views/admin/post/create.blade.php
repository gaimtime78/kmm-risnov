@extends('admin.post.layout')

@section('content')
	<h2>STFU WRITE THAT DOWN!!!!!</h2>
	<form method="POST" action="{{ route('admin.post.store') }}">
		@csrf
		<label>Title</label>
		<input type="text" name="title" /><br>
		<label>Content</label>
		<textarea name="content"></textarea><br>
		<input type="submit" value="create"/>
	</form>
@endsection