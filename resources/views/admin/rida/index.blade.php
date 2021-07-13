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
            
                            
<!-- END CONTENT -->
@endsection