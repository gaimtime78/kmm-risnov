<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		table,
		tr,
		td,
		th {
			border: 1px solid black;
		}

		table {
			width: 100%;
		}

		input,
		textarea {
			margin: 0.5rem 0;
		}

		label {
			display: block;
		}

		nav {
			display: flex;
			width: 100%;
		}

		nav div {
			margin: 0 0.5rem;
		}
	</style>
	<script src="{{ asset('js/tinymce.min.js') }}" referrerpolicy="origin"></script>

	<script>
		tinymce.init({
			selector: '#tinymce'
		});
	</script>
</head>

<body>
	<h1>POST PRIDE</h1>
	<nav>
		<div>
			<a href="{{ route('admin.post.index') }}">Index Post</a>
		</div>
		<div>
			<a href="{{ route('admin.post.create') }}">Create Post</a>
		</div>
	</nav>
	@yield('content')
</body>

</html>