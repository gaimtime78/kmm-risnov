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
					<h4 class="header left">Koran</h4>
					<a href="{{route('admin.koran.create')}}" class="waves-effect waves-light btn-large right"><i class="mdi-content-add left"></i>Tambah Koran</a>
					<div class="row">
						<div class="col s12 m12 l12">
							<table id="data-menu" class="table display" cellspacing="0">
								<thead>
									<tr>
									<th>id</th>
									<th width="350">title</th>
									<th>created by</th>
									<th>active</th>
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
											<td>{{ $row->title }}</td>
											<td>{{ $row->user->name }}</td>
											<td>
												@if($row->active)
													<div style="margin-top:0.5em; margin-bottom:0.5em;" class="task-cat cyan">Active</div>
												@else
													<div style="margin-top:0.5em; margin-bottom:0.5em;" class="task-cat red">Inactive</div>
												@endif
											</td>
											<td>
												<div>
													<a class="btn" href="{{ route('admin.koran.edit', ['id' => $row->id]) }}">Edit</a>
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