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
                            <h4 class="header left">Tabel 23 @foreach ($nama_table as $name) {{ $name->nama_table }} @endforeach</h4>
                            <!-- <a href="{{ route('admin.agenda.create') }}" class="waves-effect waves-light btn-large right"><i class="mdi-content-add left"></i>Tambah Agenda</a> -->
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <a href="#import" class="waves-effect waves-light btn right modal-trigger"
                                        role="button">Upload Excel</a>
                                    <a href="#update_nama_table" class="waves-effect waves-light btn right modal-trigger" role="button">Edit Nama Table</a>

                                    {{-- Modal update nama table --}}
                                    <div id="update_nama_table" class="modal">
                                    @foreach ($nama_table as $name) 
                                    <form action="{{route('admin.indekspenelitipkm.updateNamaTable', [$name->nama_table] )}}" method="post" enctype="multipart/form-data" >
                                        @csrf
                                        <div class="modal-content">
                                        <h4>Edit Nama table</h4>
                                        <div class="row">
                                            <div class="input-field col s12">
                                            <input value="{{ $name->nama_table }} " id="nama_table" name="nama_table"  type="text" class="validate" required>
                                            <label for="nama_table">Nama Table</label>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="modal-footer">
                                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
                                        <button type="submit" class="modal-close waves-effect waves-green btn-flat">Update</button>
                                        </div>
                                    </form>
                                    @endforeach 
                                    </div>
                                    {{-- End of modal import --}}

                                    {{-- Modal import --}}
                                    <div id="import" class="modal">
                                        <form action="{{ route('admin.h_indeks_pkm.import') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-content">
                                                <p>Import Excel Table 23 H-Indeks Penelitian PKM</p>
                                                <p>Untuk import agenda melalui excel, silahkan download template excel dan
                                                    sesuaikan masukan</p>
                                                <a href="{{ asset('template\rida\table_23_indeks_pkm.xlsx') }}">Download template</a>
                                                <h5><label for="indekspenelitipkm" class="form-label">Upload file
                                                        excel</label></h5>
                                                <input type="file" name="h_indeks_pkm">

                                                <h5><label for="tahun" class="form-label">Tahun Upload</label></h5>
                                                <input type="text" name="tahun">

                                                <h5><label for="periode" class="form-label">Periode</label></h5>
                                                <input type="text" name="periode">

                                                <h5><label for="sumber_data" class="form-label">Sumber Data</label></h5>
                                                <input type="text" name="sumber_data">
                                            </div>

                                            <div class="modal-footer">
                                                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
                                                <button type="submit" class="waves-effect waves-green btn">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                    {{-- End of modal import --}}

                                    <table id="data-menu" class="table display" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Periode</th>
                                                <th>Tahun</th>
                                                <th>Sumber Data</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($indekspenelitipkm as $row)
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $row->periode }}</td>
                                                    <td>{{ $row->tahun_input }}</td>
                                                    <td>{{ $row->sumber_data }}</td>

                                                    <td>
                                                        <a href="{{ route('admin.indekspenelitipkm.details', [$row->periode, $row->tahun_input]) }}"
                                                            class="btn" style="background-color: grey;">Detail</a>
                                                        <a href="#edit{{ $i }}" class="btn modal-trigger"
                                                            style="background-color: green;">Edit</a>
                                                        <a href="#hapus{{ $i }}" class="btn modal-trigger"
                                                            style="background-color: red;">Delete</a>
                                                    </td>
                                                    <!-- Modal Edit -->
                                                    <div id="edit{{ $i }}" class="modal modal-fixed-footer">
                                                        <form
                                                            action="{{ route('admin.indekspenelitipkm.update', [$row->periode, $row->tahun_input, $row->sumber_data]) }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-content">
                                                                <h4>Edit Data</h4>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input value="{{ $row->periode }}" id="periode"
                                                                            name="periode" type="text" class="validate"
                                                                            required>
                                                                        <label for="periode">Periode</label>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="mb-3" style="margin-left:8px">
                                                                        <label for="tahun_input">Tahun</label>
                                                                        <input value="{{ $row->tahun_input }}"
                                                                            id="tahun_input" name="tahun_input" type="text"
                                                                            class="validate" required>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="mb-3" style="margin-left:8px">
                                                                        <label for="sumber_data">Sumber Data</label>
                                                                        <input value="{{ $row->sumber_data }}"
                                                                            id="sumber_data" name="sumber_data" type="text"
                                                                            class="validate" required>
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
                                                    <div id="hapus{{ $i }}" class="modal">
                                                        <form
                                                            action="{{ route('admin.indekspenelitipkm.delete', [$row->periode, $row->tahun_input]) }}"
                                                            method="get">
                                                            @csrf
                                                            <div class="modal-content">
                                                                <h4>Delete Data</h4>
                                                                <hr>
                                                                <p>Anda yakin ingin menghapus data {{ $row->fakultas }}?
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
