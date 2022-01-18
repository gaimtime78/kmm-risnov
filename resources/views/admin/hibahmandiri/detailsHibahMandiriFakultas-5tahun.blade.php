@extends('layout.application')

@section('css')
    <link href="{{ asset('js/plugins/data-tables/css/jquery.dataTables.min.css') }}" type="text/css" rel="stylesheet"
        media="screen,projection">
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
            <!-- START CONTENT -->
            <section id="content">
                <!--breadcrumbs start-->
                <div id="breadcrumbs-wrapper">
                    <!-- Search for small screen -->
                    <div class="header-search-wrapper grey hide-on-large-only">
                        <i class="mdi-action-search active"></i>
                        <input type="text" name="Search" class="header-search-input z-depth-2"
                            placeholder="Explore Materialize">
                    </div>
                    <div class="container">
                        <!-- <div class="row">
                        <div class="col s12 m12 l12">
                          <h5 class="breadcrumbs-title">agenda</h5>
                          <ol class="breadcrumbs">
                              <li><a href="index.htm">Dashboard</a></li>
                              <li><a href="#">Tables</a></li>
                              <li class="active">Basic Tables</li>
                          </ol>
                        </div>
                      </div> -->
                    </div>
                </div>
                <!--breadcrumbs end-->
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

                        <h4 class="header left">Tabel 55 @foreach ($nama_table as $name) {{ $name->nama_table }} @endforeach </h4>
                            <a href="{{route('admin.hibahmandiri.index')}}" class="waves-effect waves-light btn right" role="button">Kembali</a>
                            <div class="row">
                                <div class="col s12 m12 l12">

                                    <div class="container py-4">
                                        <table id="data-menu" class="table display" cellspacing="0"
                                            style="border-collapse: collapse !important;">
                                            <thead>
                                                <tr style="border: 1px solid black !important;">
                                                    <th rowspan="3" style="border: 1px solid black !important; text-align:center !important;">No</th>
                                                    <th rowspan="3" style="text-align:justify !important;">Fakultas</th>
                                                    @foreach($periode_tahun as $tahun)
                                                        <th colspan="4" style="border: 1px solid black !important; text-align:center !important;">Tahun {{ $tahun->tahun_input }}</th>
                                                    @endforeach
                                                </tr>
                                                <tr style="border: 1px solid black !important;">
                                                    @foreach($periode_input as $periode)
                                                    <th  colspan="2"  style="border: 1px solid black !important; text-align:center !important;">{{ $periode }}</th>
                                                    @endforeach
                                                </tr>
                                                <tr>
                                                    @foreach($periode_input as $periode)
                                                    <th  style="border: 1px solid black !important; text-align:center !important;">Usulan</th>
                                                    <th  style="border: 1px solid black !important; text-align:center !important;">Diterima</th>
                                                    @endforeach
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($research as $row)
                                                <tr style="border: 1px solid black !important;">
                                                    <td style="border: 1px solid black !important;text-align:center !important;">{{$loop->iteration}}</td>
                                                    <td style="border: 1px solid black !important;text-align:left !important;">{{$row['fakultas']}}</td>
                                                    @foreach($row['data'] as $data)
                                                        <td style="border: 1px solid black !important;text-align:center !important;">{{$data['usulan']}}</td>
                                                        <td style="border: 1px solid black !important;text-align:center !important;">{{$data['diterima']}}</td>
                                                    @endforeach

                                                        <!-- Modal Edit -->

                                                        <!-- Modal Hapus -->
                                                        <div id="hapus" class="modal">
                                                            <form action="#" method="get">
                                                                @csrf
                                                                <div class="modal-content">
                                                                    <h4>Delete Agenda</h4>
                                                                    <hr>
                                                                    {{-- <p>Anda yakin ingin menghapus agenda {{$row->title}}?</p> --}}
                                                                    <div class="modal-footer">
                                                                        <a href="#!"
                                                                            class="modal-close waves-effect waves-green btn-flat">Close</a>
                                                                        <button type="submit"
                                                                            class="modal-close waves-effect waves-green btn-flat">Delete</button>
                                                                    </div>
                                                            </form>
                                                        </div>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
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
            @if (session('message'))
                <div style="background-color: #aee8e2; border-radius:10px; padding:10px; margin-bottom:10px;">
                    <b>{{ session('message') }}</b>
                </div>
            @endif


            <!-- END CONTENT -->
        @endsection
