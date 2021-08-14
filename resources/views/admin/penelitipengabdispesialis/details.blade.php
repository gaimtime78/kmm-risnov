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

                            <h4 class="header left">Tabel 3 RENTANG USIA PRODUKTIF PENELITI DAN PENGABDI JENJANG SPESIALIS-2
                                {{ $fakultas }}</h4>
                            <!-- <a href="{{ route('admin.agenda.create') }}" class="waves-effect waves-light btn-large right"><i class="mdi-content-add left"></i>Tambah Agenda</a> -->
                            <div class="row">
                                <div class="col s12 m12 l12">

                                    <table id="data-menu" class="table display" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th
                                                    style="border: 1px solid black !important; text-align:justify !important;">
                                                    #</th>
                                                <th
                                                    style="border: 1px solid black !important; text-align:justify !important;">
                                                    Status</th>
                                                <th
                                                    style="border: 1px solid black !important; text-align:justify !important;">
                                                    Jenjang</th>
                                                <th
                                                    style="border: 1px solid black !important; text-align:justify !important;">
                                                    25 s/d 35</th>
                                                <th
                                                    style="border: 1px solid black !important; text-align:justify !important;">
                                                    36 s/d 45</th>
                                                <th
                                                    style="border: 1px solid black !important; text-align:justify !important;">
                                                    46 s/d 55</th>
                                                <th
                                                    style="border: 1px solid black !important; text-align:justify !important;">
                                                    56 s/d 65</th>
                                                <th
                                                    style="border: 1px solid black !important; text-align:justify !important;">
                                                    66 s/d 75</th>
                                                <th
                                                    style="border: 1px solid black !important; text-align:justify !important;">
                                                    > 75</th>
                                                <th
                                                    style="border: 1px solid black !important; text-align:justify !important;">
                                                    Jumlah Total</th>
                                                <th
                                                    style="border: 1px solid black !important; text-align:justify !important;">
                                                    Total</th>
                                                <th
                                                    style="border: 1px solid black !important; text-align:justify !important;">
                                                    Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                                $x = 0;
                                            @endphp
                                            @foreach ($penelitipengabdispesialis as $row)
                                                <tr>
                                                    <td
                                                        style="border: 1px solid black !important;text-align:center !important;">
                                                        {{ $i }}</td>
                                                    <td
                                                        style="border: 1px solid black !important;text-align:center !important;">
                                                        {{ $row->status }}</td>
                                                    <td
                                                        style="border: 1px solid black !important;text-align:center !important;">
                                                        {{ $row->jenjang }}</td>
                                                    <td
                                                        style="border: 1px solid black !important;text-align:center !important;">
                                                        {{ $row->usia25sd35_jumlah }}</td>
                                                    <td
                                                        style="border: 1px solid black !important;text-align:center !important;">
                                                        {{ $row->usia36sd45_jumlah }}</td>
                                                    <td
                                                        style="border: 1px solid black !important;text-align:center !important;">
                                                        {{ $row->usia46sd55_jumlah }}</td>
                                                    <td
                                                        style="border: 1px solid black !important;text-align:center !important;">
                                                        {{ $row->usia56sd65_jumlah }}</td>
                                                    <td
                                                        style="border: 1px solid black !important;text-align:center !important;">
                                                        {{ $row->usia66sd75_jumlah }}</td>
                                                    <td
                                                        style="border: 1px solid black !important;text-align:center !important;">
                                                        {{ $row->usia75_jumlah }}</td>
                                                    <td
                                                        style="border: 1px solid black !important;text-align:center !important;">
                                                        {{ $row->total }}</td>
                                                    @if ($x++ == 0)
                                                        <td rowspan="{{ count($penelitipengabdispesialis) }}"
                                                            style="border: 1px solid black !important; text-align:center !important;">
                                                            {{ number_format((float) $totalpercent, 2, '.', '') }} %</td>
                                                    @endif

                                                    <td style="border: 1px solid black !important;"><a
                                                            href="#edit{{ $row->id }}" class="btn modal-trigger"
                                                            style="background-color: orange;">Edit</a></td>
                                                    <!-- Modal Edit -->
                                                    <div id="edit{{ $row->id }}" class="modal modal-fixed-footer">
                                                        <form
                                                            action="{{ route('admin.penelitipengabdispesialis.updaterow', $row->id) }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-content">
                                                                <h4>Edit Data Row {{ $row->status }}
                                                                    {{ $row->jenjang }} {{ $row->fakultas }}
                                                                    {{ $row->periode }} {{ $row->tahun_input }}</h4>

                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input value="{{ $row->usia25sd35_jumlah }}"
                                                                            id="usia25sd35_jumlah" name="usia25sd35_jumlah"
                                                                            type="text" class="validate" required>
                                                                        <label for="usia25sd35_jumlah">Usia 25 s.d.
                                                                            35</label>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input value="{{ $row->usia36sd45_jumlah }}"
                                                                            id="usia36sd45_jumlah" name="usia36sd45_jumlah"
                                                                            type="text" class="validate" required>
                                                                        <label for="usia36sd45_jumlah">Usia 36 s.d.
                                                                            45</label>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input value="{{ $row->usia46sd55_jumlah }}"
                                                                            id="usia46sd55_jumlah" name="usia46sd55_jumlah"
                                                                            type="text" class="validate" required>
                                                                        <label for="usia46sd55_jumlah">Usia 46 s.d.
                                                                            55</label>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input value="{{ $row->usia56sd65_jumlah }}"
                                                                            id="usia56sd65_jumlah" name="usia56sd65_jumlah"
                                                                            type="text" class="validate" required>
                                                                        <label for="usia56sd65_jumlah">Usia 56 s.d.
                                                                            65</label>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input value="{{ $row->usia66sd75_jumlah }}"
                                                                            id="usia66sd75_jumlah" name="usia66sd75_jumlah"
                                                                            type="text" class="validate" required>
                                                                        <label for="usia66sd75_jumlah">Usia 66 s.d.
                                                                            75</label>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input value="{{ $row->usia75_jumlah }}"
                                                                            id="usia75_jumlah" name="usia75_jumlah"
                                                                            type="text" class="validate" required>
                                                                        <label for="usia75_jumlah">Usia 75 ke atas</label>
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
                                                </tr>
                                                @php
                                                    $i++;
                                                @endphp
                                            @endforeach

                                        </tbody>
                                        <thead>
                                            <tr>
                                                <th colspan="3"
                                                    style="border: 1px solid black !important; text-align:center !important;">
                                                    Jumlah</th>
                                                <th style="border: 1px solid black !important; text-align:center ;">
                                                    {{ $sum25sd35_jumlah }}</th>
                                                <th style="border: 1px solid black !important; text-align:center ;">
                                                    {{ $sum36sd45_jumlah }}</th>
                                                <th style="border: 1px solid black !important; text-align:center ;">
                                                    {{ $sum46sd55_jumlah }}</th>
                                                <th style="border: 1px solid black !important; text-align:center ;">
                                                    {{ $sum56sd65_jumlah }}</th>
                                                <th style="border: 1px solid black !important; text-align:center ;">
                                                    {{ $sum66sd75_jumlah }}</th>
                                                <th style="border: 1px solid black !important; text-align:center ;">
                                                    {{ $sum75_jumlah }}</th>
                                                <th style="border: 1px solid black !important; text-align:center ;">
                                                    {{ $total }}</th>
                                            </tr>

                                        </thead>
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
            @if (session('message'))
                <div style="background-color: #aee8e2; border-radius:10px; padding:10px; margin-bottom:10px;">
                    <b>{{ session('message') }}</b>
                </div>
            @endif


            <!-- END CONTENT -->
        @endsection
