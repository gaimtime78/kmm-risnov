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

                            <h4 class="header left">Tabel 1 RENTANG USIA PRODUKTIF PENELITI DAN PENGABDI JENJANG DOKTOR
                                {{ $fakultas }}</h4>
                            <!-- <a href="{{ route('admin.agenda.create') }}" class="waves-effect waves-light btn-large right"><i class="mdi-content-add left"></i>Tambah Agenda</a> -->
                            <div class="row">
                                <div class="col s12 m12 l12">

                                    <table id="data-menu" class="table display" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th style="text-align:justify !important;">#</th>
                                                <th style="text-align:justify !important;">Status</th>
                                                <th style="text-align:justify !important;">Jenjang</th>
                                                <th style="text-align:justify !important;">25 s/d 35 L</th>
                                                <th style="text-align:justify !important;">25 s/d 35 P</th>
                                                <th style="text-align:justify !important;">Jumlah Total</th>
                                                <th style="text-align:justify !important;">36 s/d 45 L</th>
                                                <th style="text-align:justify !important;">36 s/d 45 P</th>
                                                <th style="text-align:justify !important;">Jumlah Total</th>
                                                <th style="text-align:justify !important;"> 46 s/d 55 L</th>
                                                <th style="text-align:justify !important;"> 46 s/d 55 P</th>
                                                <th style="text-align:justify !important;">Jumlah Total</th>
                                                <th style="text-align:justify !important;"> 56 s/d 65 L</th>
                                                <th style="text-align:justify !important;"> 56 s/d 65 P</th>
                                                <th style="text-align:justify !important;">Jumlah Total</th>
                                                <th style="text-align:justify !important;"> 66 s/d 75 L</th>
                                                <th style="text-align:justify !important;"> 66 s/d 75 P</th>
                                                <th style="text-align:justify !important;">Jumlah Total</th>
                                                <th style="text-align:justify !important;"> - > 75 L</th>
                                                <th style="text-align:justify !important;"> - > 75 P</th>
                                                <th style="text-align:justify !important;">Jumlah Total</th>
                                                <th style="text-align:justify !important;">Total</th>
                                                <th style="text-align:justify !important;">Total Percent %</th>
                                                <th style="text-align:justify !important;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($penelitipengabdi as $row)
                                                <tr>
                                                    <td style="text-align:center !important;">{{ $i }}</td>
                                                    <td style="text-align:center !important;">{{ $row->status }}</td>
                                                    <td style="text-align:center !important;">{{ $row->jenjang }}</td>
                                                    <td style="text-align:center !important;">{{ $row->usia25sd35_L }}</td>
                                                    <td style="text-align:center !important;">{{ $row->usia25sd35_P }}</td>
                                                    <td style="text-align:center !important;">{{ $row->usia25sd35_jumlah }}
                                                    </td>
                                                    <td style="text-align:center !important;">{{ $row->usia36sd45_L }}</td>
                                                    <td style="text-align:center !important;">{{ $row->usia36sd45_P }}</td>
                                                    <td style="text-align:center !important;">{{ $row->usia36sd45_jumlah }}
                                                    </td>
                                                    <td style="text-align:center !important;">{{ $row->usia46sd55_L }}</td>
                                                    <td style="text-align:center !important;">{{ $row->usia46sd55_P }}</td>
                                                    <td style="text-align:center !important;">{{ $row->usia46sd55_jumlah }}
                                                    </td>
                                                    <td style="text-align:center !important;">{{ $row->usia56sd65_L }}</td>
                                                    <td style="text-align:center !important;">{{ $row->usia56sd65_P }}</td>
                                                    <td style="text-align:center !important;">{{ $row->usia56sd65_jumlah }}
                                                    </td>
                                                    <td style="text-align:center !important;">{{ $row->usia66sd75_L }}</td>
                                                    <td style="text-align:center !important;">{{ $row->usia66sd75_P }}</td>
                                                    <td style="text-align:center !important;">{{ $row->usia66sd75_jumlah }}
                                                    </td>
                                                    <td style="text-align:center !important;">{{ $row->usia75_L }}</td>
                                                    <td style="text-align:center !important;">{{ $row->usia75_P }}</td>
                                                    <td style="text-align:center !important;">{{ $row->usia75_jumlah }}
                                                    </td>
                                                    <td style="text-align:center !important;">{{ $row->total }}</td>
                                                    <td style="text-align:center !important;"></td>


                                                    <td>
                                                        <a href="#edit{{ $row->id }}" class="btn modal-trigger"
                                                            style="background-color: orange;">Edit</a>
                                                        <a href="#hapus{{ $row->id }}" class="btn modal-trigger"
                                                            style="background-color: red;">Delete</a>
                                                    </td>
                                                    <!-- Modal Edit -->
                                                    <div id="edit{{ $row->id }}" class="modal modal-fixed-footer">
                                                        <form
                                                            action="{{ route('admin.penelitipengabdi.updaterow', ['id' => $row->id]) }}"
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
                                                                        <label for="usia25sd35_L">Usia 25 s.d. 35
                                                                            Laki-laki</label>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input value="{{ $row->usia25sd35_P }}"
                                                                            id="usia25sd35_P" name="usia25sd35_P"
                                                                            type="text" class="validate" required>
                                                                        <label for="usia25sd35_P">Usia 25 s.d. 35
                                                                            Perempuan</label>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input value="{{ $row->usia36sd45_L }}"
                                                                            id="usia36sd45_L" name="usia36sd45_L"
                                                                            type="text" class="validate" required>
                                                                        <label for="usia36sd45_L">Usia 36 s.d. 45
                                                                            Laki-laki</label>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input value="{{ $row->usia36sd45_P }}"
                                                                            id="usia36sd45_P" name="usia36sd45_P"
                                                                            type="text" class="validate" required>
                                                                        <label for="usia36sd45_P">Usia 36 s.d. 45
                                                                            Perempuan</label>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input value="{{ $row->usia46sd55_L }}"
                                                                            id="usia46sd55_L" name="usia46sd55_L"
                                                                            type="text" class="validate" required>
                                                                        <label for="usia46sd55_L">Usia 46 s.d. 55
                                                                            Laki-laki</label>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input value="{{ $row->usia46sd55_P }}"
                                                                            id="usia46sd55_P" name="usia46sd55_P"
                                                                            type="text" class="validate" required>
                                                                        <label for="usia46sd55_P">Usia 46 s.d. 55
                                                                            Perempuan</label>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input value="{{ $row->usia56sd65_L }}"
                                                                            id="usia56sd65_L" name="usia56sd65_L"
                                                                            type="text" class="validate" required>
                                                                        <label for="usia56sd65_L">Usia 56 s.d. 65
                                                                            Laki-laki</label>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input value="{{ $row->usia56sd65_P }}"
                                                                            id="usia56sd65_P" name="usia56sd65_P"
                                                                            type="text" class="validate" required>
                                                                        <label for="usia56sd65_P">Usia 56 s.d. 65
                                                                            Perempuan</label>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input value="{{ $row->usia66sd75_L }}"
                                                                            id="usia66sd75_L" name="usia66sd75_L"
                                                                            type="text" class="validate" required>
                                                                        <label for="usia66sd75_L">Usia 66 s.d. 75
                                                                            Laki-laki</label>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input value="{{ $row->usia66sd75_P }}"
                                                                            id="usia66sd75_P" name="usia66sd75_P"
                                                                            type="text" class="validate" required>
                                                                        <label for="usia66sd75_P">Usia 66 s.d. 75
                                                                            Perempuan</label>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input value="{{ $row->usia75_L }}" id="usia75_L"
                                                                            name="usia75_L" type="text" class="validate"
                                                                            required>
                                                                        <label for="usia75_L">Usia 75 ke atas
                                                                            Laki-laki</label>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input value="{{ $row->usia75_P }}" id="usia75_P"
                                                                            name="usia75_P" type="text" class="validate"
                                                                            required>
                                                                        <label for="usia75_P">Usia 75 ke atas
                                                                            Perempuan</label>
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
                                                    <div id="hapus{{ $row->id }}" class="modal">
                                                        <form action="{{ route('admin.penelitipengabdi.deleterow', ['id' => $row->id]) }}" method="get">
                                                            @csrf
                                                            <div class="modal-content">
                                                                <h4>Delete Agenda</h4>
                                                                <hr>
                                                                <p>Anda yakin ingin menghapus data?
                                                                </p>
                                                                <div class="modal-footer">
                                                                    <a href="#!"
                                                                        class="modal-close waves-effect waves-green btn-flat">Close</a>
                                                                    <button type="submit"
                                                                        class="modal-close waves-effect waves-green btn-flat">Delete</button>
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
                                                <th colspan="3" style="text-align:center !important;">Jumlah Universitas
                                                    Sebelas Maret</th>
                                                <th style="text-align:justify !important;">{{ $sum25_35L }}</th>
                                                <th style="text-align:justify !important;">{{ $sum25_35P }}</th>
                                                <th style="text-align:justify !important;">{{ $sum25sd35_jumlah }}</th>
                                                <th style="text-align:justify !important;">{{ $sum36_45L }}</th>
                                                <th style="text-align:justify !important;">{{ $sum36_45P }}</th>
                                                <th style="text-align:justify !important;">{{ $sum36sd45_jumlah }}</th>
                                                <th style="text-align:justify !important;">{{ $sum46_55L }}</th>
                                                <th style="text-align:justify !important;">{{ $sum46_55P }}</th>
                                                <th style="text-align:justify !important;">{{ $sum46sd55_jumlah }}</th>
                                                <th style="text-align:justify !important;">{{ $sum56_65L }}</th>
                                                <th style="text-align:justify !important;">{{ $sum56_65P }}</th>
                                                <th style="text-align:justify !important;">{{ $sum56sd65_jumlah }}</th>
                                                <th style="text-align:justify !important;">{{ $sum66_75L }}</th>
                                                <th style="text-align:justify !important;">{{ $sum66_75P }}</th>
                                                <th style="text-align:justify !important;">{{ $sum66sd75_jumlah }}</th>
                                                <th style="text-align:justify !important;">{{ $sum75L }}</th>
                                                <th style="text-align:justify !important;">{{ $sum75P }}</th>
                                                <th style="text-align:justify !important;">{{ $sum75_jumlah }}</th>
                                                <th style="text-align:justify !important;">{{ $total }}</th>
                                                <th colspan="2" style="text-align:justify !important;">
                                                    {{ number_format((float) $totalpercent, 2, '.', '') }} %</th>
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
