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
	<!-- START CONTENT -->
	<section id="content">
		<!--start container-->
		<div class="container">
			<div class="section">    
				<!--DataTables example-->
				@if (session('message'))
				<div style="background-color: #aee8e2; border-radius:10px; padding:10px; margin-bottom:10px;">
					<b>{{ session('message') }}</b>
				</div>
				@endif
				<div id="table-datatables">
					<h4 class="header left">Permission</h4>
					<a href="{{route('admin.permission.create')}}" class="waves-effect waves-light btn-large right"><i class="mdi-content-add left"></i>Tambah Role</a>
					<div class="row">
						<div class="col s12 m12 l12">
							<table id="data-menu" class="table display" cellspacing="0">
								<thead>
									<tr>
									<th>id</th>
									<th width="350">Role</th>
									<th>Action</th>
										</tr>
								</thead>
								<tbody>
									@php
										$i = 1;
									@endphp
									@foreach($data as $row)
										<tr>
											<td>{{ $i }}</td>
											<td>{{ $row->name }}</td>
											<td>
												<div>
													<a class="btn" href="{{ route('admin.permission.edit', ['id' => $row->id]) }}">Edit</a>
													<a href="{{ route('admin.permission.delete', ['id' => $row->id]) }}" class="btn modal-trigger" style="background-color: red;">Delete</a>
												</div>
											</td>
										</tr>
										@php
											$i++;
										@endphp
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div> 
				<br>
				<div class="divider"></div> 
				<!--DataTables example Row grouping-->
			</div>
		</div>
		<!--end container-->

	</section>
	<!-- END CONTENT -->
@endsection