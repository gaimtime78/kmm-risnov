@extends('layout.application')

@section('css')
<link href="{{ asset('js/plugins/data-tables/css/jquery.dataTables.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
@endsection

@section('js')
<script type="text/javascript" src="{{ asset('js/plugins/data-tables/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/plugins/data-tables/data-tables-script.js') }}"></script>
@endsection

@section('content')
@include('layout.navbar')
<!-- START MAIN -->
<div id="main">
	<!-- START WRAPPER -->
	<div class="wrapper">
		@include('layout.menu')
		<!--DataTables example-->
		<div id="table-datatables">
			<h4 class="header">Semua Berita</h4>
			<div class="row">
				<div class="input-field col left">
					<a href="{{ route('admin.post.create') }}">
						<button class="btn warning waves-effect waves-light right" type="submit" name="action">CREATE
						</button>
					</a>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<table id="data-table-simple" class="responsive-table display" cellspacing="0">
						<thead>
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
						</thead>

						<tbody>
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
						</tbody>
					</table>
				</div>
			</div>
		</div>

	</div>
</div>
@endsection