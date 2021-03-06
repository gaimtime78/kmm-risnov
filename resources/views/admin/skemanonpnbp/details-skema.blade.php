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

                            <h4 class="header left">Tabel 26 SKEMA PROPOSAL PENELITIAN DAN PENGABDIAN PNBP {{$periode}} - {{$tahun}} - {{$jenis}}</h4>
                            <h4 class="header left">*Keterangan : {{$keterangan}}</h4>
                            <div class="row">
                                <div class="col s12 m12 l12">

                                    <div class="container py-4">
                                        <table id="data-menu" class="table display" cellspacing="0"
                                            style="border-collapse: collapse !important;">
                                            <thead>
                                                <tr style="border: 1px solid black !important;">
                                                    <th rowspan="3"
                                                        style="border: 1px solid black !important; text-align:center !important;">
                                                        No</th>
                                                    <th
                                                        style="border: 1px solid black !important; text-align:center !important;">
                                                        Fakultas</th>
                                                    <th rowspan="3"
                                                        style="border: 1px solid black !important; text-align:center !important;">
                                                        Jumlah</th>
                                                    <th rowspan="3"
                                                        style="border: 1px solid black !important; text-align:center !important;">
                                                        Keterangan</th>
                                                    <th rowspan="3"
                                                        style="border: 1px solid black !important;text-align:justify !important;">
                                                        Action</th>
                                                </tr>
                                               
                                            </thead>
                                            <tbody>
                                                @foreach ($skemanonpnbp as $row)

                                                    <tr style="border: 1px solid black !important;">
                                                        <td
                                                            style="border: 1px solid black !important;text-align:center !important;">
                                                            {{ $loop->iteration }}</td>
                                                        <td
                                                            style="border: 1px solid black !important;text-align:center !important;">
                                                            {{ $row->fakultas }}</td>

                                                        <td
                                                            style="border: 1px solid black !important;text-align:center !important;">
                                                            {{ $row->jumlah }}</td>
                                                        @if($loop->iteration <= 1)
                                                        <td  rowspan="{{ count($skemanonpnbp) }}"
                                                            style="border: 1px solid black !important;text-align:center !important;">
                                                            {{ $row->keterangan }}</td>
                                                        @endif

                                                        <td style="border: 1px solid black !important;"><a href="#edit{{ $row->id }}"
                                                                class="btn modal-trigger"
                                                                style="background-color: orange;">Edit</a></td>
                                                        <!-- Modal Edit -->
                                                        <div id="edit{{ $row->id }}" class="modal modal-fixed-footer">
                                                            <form
                                                                action="{{route('admin.skemanonpnbp.edit-jumlah')}}"
                                                                method="post">
                                                                @csrf
                                                                <input type="hidden" value="{{$row->id}}" name="id">
                                                                <div class="modal-content">
                                                                    <h4>Edit Data</h4>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="input-field col s12">
                                                                            <input value="{{ $row->fakultas }}" id="periode"
                                                                                name="fakultas" type="text"
                                                                                class="validate" required>
                                                                            <label for="periode">Fakultas</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="input-field col s12">
                                                                            <input value="{{ $row->jumlah }}" id="periode"
                                                                                name="jumlah" type="text"
                                                                                class="validate" required>
                                                                            <label for="periode">Jumlah</label>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <a href="#!"
                                                                        class="modal-close waves-effect waves-green btn-flat">Close</a>
                                                                    <button type="submit"
                                                                        class="modal-close waves-effect waves-green btn-flat">Update</button>
                                                                </div>
                                                            </form>
                                                        </div>

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
                                            <!-- <thead>
                                                <tr>
                                                    <th colspan="2"
                                                        style="border: 1px solid black !important; text-align:center !important;">
                                                        Jumlah Universitas Sebelas Maret</th>
                                                    <th
                                                        style="border: 1px solid black !important; text-align:center !important;">
                                                        {{ $total['jumlah'] }}</th>
                                                </tr>

                                            </thead> -->
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
