

@extends('layout.application')

@section('css')
<link href="{{asset('js\plugins\data-tables\css\jquery.dataTables.min.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
@endsection

@section('content')

@include('layout.navbar')

<!-- START MAIN -->
<div id="main">
<!-- START WRAPPER -->
<div class="wrapper">
@include('layout.menu')
    <!-- START CONTENT -->
    <section id="content">
	  <!--breadcrumbs start-->
		<div id="breadcrumbs-wrapper">
				<!-- Search for small screen -->
				<div class="header-search-wrapper grey hide-on-large-only">
					<i class="mdi-action-search active"></i>
					<input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
				</div>
				
			<div class="container">
				<div class="row">
				<div class="col s12 m12 l12">
					<h5 class="breadcrumbs-title">Basic Tables</h5>
					<ol class="breadcrumbs">
						<li><a href="index.htm">Dashboard</a></li>
						<li><a href="#">Tables</a></li>
						<li class="active">Basic Tables</li>
					</ol>
				</div>
				</div>
			</div>
			</div>
			<!--breadcrumbs end-->


			 <!--start container-->
			 <div class="container">
				<div class="section">    
					<!--DataTables example-->
					<div id="table-datatables">
					<h4 class="header left">Post</h4>
					<a href="{{route('admin.post.create')}}" class="waves-effect waves-light btn-large right"><i class="mdi-content-add left"></i>Tambah Post</a>
					
					<div class="row">
						<div class="col s12 m12 l12">
						
							<h2>Edit Post</h2>
							<form method="POST" action="{{ route('admin.post.update', ['id' => $data->id]) }}">
								@csrf
								@method('put')
								<label>Title</label>
								<input type="text" name="title" value="{{ $data->title }}"/><br>
								<label>Content</label>
								<textarea name="content" id="tinymce">{{ $data->content }}</textarea><br>
								<input type="submit" value="update"/>
							</form>
							<form method="POST" action="{{ route('admin.post.delete', ['id' => $data->id]) }}">
								@csrf
								@method('delete')
								<input type="submit" value="delete"/>
							</form>
						    
							</div>
						<!-- Floating Action Button -->
							<div class="fixed-action-btn" style="bottom: 50px; right: 19px;">
								<a class="btn-floating btn-large">
								<i class="mdi-action-stars"></i>
								</a>
								<ul>
								<li><a href="css-helpers.htm" class="btn-floating red"><i class="large mdi-communication-live-help"></i></a></li>
								<li><a href="app-widget.htm" class="btn-floating yellow darken-1"><i class="large mdi-device-now-widgets"></i></a></li>
								<li><a href="app-calendar.htm" class="btn-floating green"><i class="large mdi-editor-insert-invitation"></i></a></li>
								<li><a href="app-email.htm" class="btn-floating blue"><i class="large mdi-communication-email"></i></a></li>
								</ul>
							</div>
							<!-- Floating Action Button -->
						</div>
						<!--end container-->

					</section>
					<!-- END CONTENT -->
				
						@endsection

				@section('js')
					@if (session('message')) 
						<script>
							$("document").ready( function() {
								Materialize.toast("{{ session('message') }}", 4000)
							});
						</script>
					@endif
					<script type="text/javascript" src="{{asset("js\plugins\prism\prism.js")}}"></script>
					<script type="text/javascript" src="{{asset("js\plugins\data-tables\js\jquery.dataTables.min.js")}}"></script>
					<script type="text/javascript" src="{{asset("js\plugins\data-tables\data-tables-script.js")}}"></script>
				@endsection