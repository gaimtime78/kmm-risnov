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

                            <h4 class="header left">TABEL RENTANG USIA PRODUKTIF TENAGA PENDIDIK JENJANG MAGISTER																		
                                {{ $fakultas }}</h4>
                            <!-- <a href="{{ route('admin.agenda.create') }}" class="waves-effect waves-light btn-large right"><i class="mdi-content-add left"></i>Tambah Agenda</a> -->
                            <div class="row">
                                <div class="col s12 m12 l12">

                                    <table id="data-menu" class="table display" cellspacing="0">
                                        <thead>
                                        <tr>
                                                <th
                                                    rowspan="2" style="border: 1px solid black !important; text-align:center !important;">
                                                    #</th>
                                                <th
                                                    rowspan="2" style="border: 1px solid black !important; text-align:center !important;">
                                                    Status</th>
                                                <th
                                                    rowspan="2" style="border: 1px solid black !important; text-align:center !important;">
                                                    Jenjang</th>
                                                
                                                <th
                                                    colspan="3" style="border: 1px solid black !important; text-align:center !important;">
                                                    25 s/d 35</th>
                                                <th
                                                    colspan="3" style="border: 1px solid black !important; text-align:center !important;">
                                                    36 s/d 45</th>
                                                <th
                                                    colspan="3" style="border: 1px solid black !important; text-align:center !important;">
                                                    46 s/d 55</th>
                                                <th
                                                    colspan="3" style="border: 1px solid black !important; text-align:center !important;">
                                                    56 s/d 65</th>
                                                <th
                                                    colspan="3" style="border: 1px solid black !important; text-align:center !important;">
                                                    66 s/d 75</th>
                                                <th 
                                                    colspan="3" style="border: 1px solid black !important; text-align:center !important;">
                                                    < 75</th>
                                                <th
                                                    rowspan="2" style="border: 1px solid black !important; text-align:center !important;">
                                                    Total</th>
                                                <th
                                                    rowspan="2" style="border: 1px solid black !important; text-align:center !important;">
                                                    %</th>
                                                <th
                                                    rowspan="2" style="border: 1px solid black !important; text-align:center !important;">
                                                    Action</th>
                                            </tr>
                                            <tr>
                                                
                                                <th
                                                    style="border: 1px solid black !important; text-align:justify !important;">
                                                    25 s/d 35 P</th>
                                                <th
                                                    style="border: 1px solid black !important; text-align:justify !important;">
                                                    25 s/d 35 P</th>
                                                <th
                                                    style="border: 1px solid black !important; text-align:justify !important;">
                                                    JML</th>
                                                <th
                                                    style="border: 1px solid black !important; text-align:justify !important;">
                                                    36 s/d 45 L</th>
                                                <th
                                                    style="border: 1px solid black !important; text-align:justify !important;">
                                                    36 s/d 45 P</th>
                                                <th
                                                    style="border: 1px solid black !important; text-align:justify !important;">
                                                    JML</th>
                                                <th
                                                    style="border: 1px solid black !important; text-align:justify !important;">
                                                    46 s/d 55 L</th>
                                                <th
                                                    style="border: 1px solid black !important; text-align:justify !important;">
                                                    46 s/d 55 P</th>
                                                <th
                                                    style="border: 1px solid black !important; text-align:justify !important;">
                                                    JML</th>
                                                <th
                                                    style="border: 1px solid black !important; text-align:justify !important;">
                                                    56 s/d 65 L</th>
                                                <th
                                                    style="border: 1px solid black !important; text-align:justify !important;">
                                                    56 s/d 65 P</th>
                                                <th
                                                    style="border: 1px solid black !important; text-align:justify !important;">
                                                    JML</th>
                                                <th
                                                    style="border: 1px solid black !important; text-align:justify !important;">
                                                    66 s/d 75 L</th>
                                                <th
                                                    style="border: 1px solid black !important; text-align:justify !important;">
                                                    66 s/d 75 P</th>
                                                <th
                                                    style="border: 1px solid black !important; text-align:justify !important;">
                                                    JML</th>
                                                <th
                                                    style="border: 1px solid black !important; text-align:justify !important;">
                                                    < 75 L</th>
                                                <th
                                                    style="border: 1px solid black !important; text-align:justify !important;">
                                                    < 75 P</th>
                                                <th
                                                    style="border: 1px solid black !important; text-align:justify !important;">
                                                    JML</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                                $x = 0;
                                            @endphp
                                            @foreach ($usiaproduktifsp_2 as $row)
                                                <tr>
                                                    <td
                                                        style="border: 1px solid black !important; text-align:center !important;">
                                                        {{ $i }}</td>
                                                    <td
                                                        style="border: 1px solid black !important; text-align:center !important;">
                                                        {{ $row->status }}</td>
                                                    <td
                                                        style="border: 1px solid black !important; text-align:center !important;">
                                                        {{ $row->jenjang }}</td>
                                                    <td
                                                        style="border: 1px solid black !important; text-align:center !important;">
                                                        {{ $row->usia25sd35_L }}</td>
                                                    <td
                                                        style="border: 1px solid black !important; text-align:center !important;">
                                                        {{ $row->usia25sd35_P }}</td>
                                                    <td
                                                        style="border: 1px solid black !important; text-align:center !important;">
                                                        {{ $row->usia25sd35_jumlah }}</td>
                                                    <td
                                                        style="border: 1px solid black !important; text-align:center !important;">
                                                        {{ $row->usia36sd45_L }}</td>
                                                    <td
                                                        style="border: 1px solid black !important; text-align:center !important;">
                                                        {{ $row->usia36sd45_P }}</td>
                                                    <td
                                                        style="border: 1px solid black !important; text-align:center !important;">
                                                        {{ $row->usia36sd45_jumlah }}</td>
                                                    <td
                                                        style="border: 1px solid black !important; text-align:center !important;">
                                                        {{ $row->usia46sd55_L }}</td>
                                                    <td
                                                        style="border: 1px solid black !important; text-align:center !important;">
                                                        {{ $row->usia46sd55_P }}</td>
                                                    <td
                                                        style="border: 1px solid black !important; text-align:center !important;">
                                                        {{ $row->usia46sd55_jumlah }}</td>
                                                    <td
                                                        style="border: 1px solid black !important; text-align:center !important;">
                                                        {{ $row->usia56sd65_L }}</td>
                                                    <td
                                                        style="border: 1px solid black !important; text-align:center !important;">
                                                        {{ $row->usia56sd65_P }}</td>
                                                    <td
                                                        style="border: 1px solid black !important; text-align:center !important;">
                                                        {{ $row->usia56sd65_jumlah }}</td>
                                                    <td
                                                        style="border: 1px solid black !important; text-align:center !important;">
                                                        {{ $row->usia66sd75_L }}</td>
                                                    <td
                                                        style="border: 1px solid black !important; text-align:center !important;">
                                                        {{ $row->usia66sd75_P }}</td>
                                                    <td
                                                        style="border: 1px solid black !important; text-align:center !important;">
                                                        {{ $row->usia66sd75_jumlah }}</td>
                                                    <td
                                                        style="border: 1px solid black !important; text-align:center !important;">
                                                        {{ $row->usia75_L }}</td>
                                                    <td
                                                        style="border: 1px solid black !important; text-align:center !important;">
                                                        {{ $row->usia75_P }}</td>
                                                    <td
                                                        style="border: 1px solid black !important; text-align:center !important;">
                                                        {{ $row->usia75_jumlah }}</td>
                                                    <td
                                                        style="border: 1px solid black !important; text-align:center !important;">
                                                        {{ $row->total }}</td>
                                                    @if ($x++ == 0)
                                                        <td rowspan="{{ count($usiaproduktifsp_2) }}"
                                                            style="border: 1px solid black !important; text-align:center !important;">
                                                            {{ number_format((float) $totalpercent, 2, '.', '') }} %</td>
                                                    @endif


                                                    <td style="border: 1px solid black !important;"><a
                                                            href="#edit{{ $row->id }}" class="btn modal-trigger"
                                                            style="background-color: orange;">Edit</a></td>
                                                    <!-- Modal Edit -->
                                                    <div id="edit{{ $row->id }}" class="modal modal-fixed-footer">
                                                        <form
                                                            action="{{ route('admin.usiaproduktifsp_2.updaterow', $row->id) }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-content">
                                                                <h4>Edit Data Row {{ $row->status }}
                                                                    {{ $row->jenjang }} {{ $row->fakultas }}
                                                                    {{ $row->periode }} {{ $row->tahun_input }}</h4>

                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input value="{{ $row->usia25sd35_L }}"
                                                                            id="usia25sd35_L" name="usia25sd35_L"
                                                                            type="text" class="validate" required>
                                                                        <label for="usia25sd35_L">Usia 25 s.d.
                                                                            35 L</label>
                                                                    </div>
                                                                </div>
                                                               
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input value="{{ $row->usia25sd35_P }}"
                                                                            id="usia25sd35_P" name="usia25sd35_P"
                                                                            type="text" class="validate" required>
                                                                        <label for="usia25sd35_P">Usia 25 s.d.
                                                                            35 P</label>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input value="{{ $row->usia36sd45_L }}"
                                                                            id="usia36sd45_L" name="usia36sd45_L"
                                                                            type="text" class="validate" required>
                                                                        <label for="usia36sd45_L">Usia 36 s.d.
                                                                            45 L</label>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input value="{{ $row->usia36sd45_P }}"
                                                                            id="usia36sd45_P" name="usia36sd45_P"
                                                                            type="text" class="validate" required>
                                                                        <label for="usia36sd45_P">Usia 36 s.d.
                                                                            45 P</label>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input value="{{ $row->usia46sd55_L }}"
                                                                            id="usia46sd55_L" name="usia46sd55_L"
                                                                            type="text" class="validate" required>
                                                                        <label for="usia46sd55_L">Usia 46 s.d.
                                                                            55 L</label>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input value="{{ $row->usia46sd55_P }}"
                                                                            id="usia46sd55_P" name="usia46sd55_P"
                                                                            type="text" class="validate" required>
                                                                        <label for="usia46sd55_P">Usia 46 s.d.
                                                                            55 P</label>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input value="{{ $row->usia56sd65_L }}"
                                                                            id="usia56sd65_L" name="usia56sd65_L"
                                                                            type="text" class="validate" required>
                                                                        <label for="usia56sd60_L">Usia 56 s.d.
                                                                            65 L</label>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input value="{{ $row->usia56sd65_P }}"
                                                                            id="usia56sd65_P" name="usia56sd65_P"
                                                                            type="text" class="validate" required>
                                                                        <label for="usia56sd65_P">Usia 56 s.d.
                                                                            65 P</label>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input value="{{ $row->usia66sd75_L }}"
                                                                            id="usia66sd75_L" name="usia66sd75_L"
                                                                            type="text" class="validate" required>
                                                                        <label for="usia66sd75_L">Usia 66 s.d.
                                                                            75 L</label>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input value="{{ $row->usia66sd75_P }}"
                                                                            id="usia66sd75_P" name="usia66sd75_P"
                                                                            type="text" class="validate" required>
                                                                        <label for="usia66sd75_P">Usia 66 s.d.
                                                                            75 P</label>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input value="{{ $row->usia75_L }}"
                                                                            id="usia75_L" name="usia75_L"
                                                                            type="text" class="validate" required>
                                                                        <label for="usia75_L">Usia < 75 L</label>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input value="{{ $row->usia75_P }}"
                                                                            id="usia75_P" name="usia75_P"
                                                                            type="text" class="validate" required>
                                                                        <label for="usia75_P">Usia < 75 P</label>
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

                                               

                                                <th
                                                    style="border: 1px solid black !important; text-align:justify !important;">
                                                    {{ $sum25sd35_L }}</th>
                                                <th
                                                    style="border: 1px solid black !important; text-align:justify !important;">
                                                    {{ $sum25sd35_P }}</th>
                                                <th
                                                    style="border: 1px solid black !important; text-align:justify !important;">
                                                    {{ $sum25sd35_jumlah }}</th>


                                                <th
                                                    style="border: 1px solid black !important; text-align:justify !important;">
                                                    {{ $sum36sd45_L }}</th>
                                                <th
                                                    style="border: 1px solid black !important; text-align:justify !important;">
                                                    {{ $sum36sd45_P }}</th>
                                                <th
                                                    style="border: 1px solid black !important; text-align:justify !important;">
                                                    {{ $sum36sd45_jumlah }}</th>


                                                <th
                                                    style="border: 1px solid black !important; text-align:justify !important;">
                                                    {{ $sum46sd55_L }}</th>
                                                <th
                                                    style="border: 1px solid black !important; text-align:justify !important;">
                                                    {{ $sum46sd55_P }}</th>
                                                <th
                                                    style="border: 1px solid black !important; text-align:justify !important;">
                                                    {{ $sum46sd55_jumlah }}</th>
                                                
                                                <th
                                                    style="border: 1px solid black !important; text-align:justify !important;">
                                                    {{ $sum56sd65_L }}</th>
                                                <th
                                                    style="border: 1px solid black !important; text-align:justify !important;">
                                                    {{ $sum56sd65_P }}</th>
                                                <th
                                                    style="border: 1px solid black !important; text-align:justify !important;">
                                                    {{ $sum56sd65_jumlah }}</th>
                                                <th
                                                    style="border: 1px solid black !important; text-align:justify !important;">
                                                    {{ $sum66sd75_L }}</th>
                                                <th
                                                    style="border: 1px solid black !important; text-align:justify !important;">
                                                    {{ $sum66sd75_P }}</th>
                                                <th
                                                    style="border: 1px solid black !important; text-align:justify !important;">
                                                    {{ $sum66sd75_jumlah }}</th>
                                                <th
                                                    style="border: 1px solid black !important; text-align:justify !important;">
                                                    {{ $sum75_L }}</th>
                                                <th
                                                    style="border: 1px solid black !important; text-align:justify !important;">
                                                    {{ $sum75_P }}</th>
                                                <th
                                                    style="border: 1px solid black !important; text-align:justify !important;">
                                                    {{ $sum75_jumlah }}</th>
                                                
                                                <th
                                                    style="border: 1px solid black !important; text-align:justify !important;">
                                                    {{ $total }}</th>
                                                <th
                                                    style="border: 1px solid black !important; text-align:justify !important;">
                                                    </th>
                                                <th
                                                    style="border: 1px solid black !important; text-align:justify !important;">
                                                    </th>
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
