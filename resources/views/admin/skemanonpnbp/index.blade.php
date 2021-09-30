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
                            <h4 class="header left">Tabel 26 SKEMA PROPOSAL PENELITIAN DAN PENGABDIAN PNBP</h4>
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <a href="#import" class="waves-effect waves-light btn right modal-trigger"
                                        role="button">Upload Excel</a>

                                    {{-- Modal import --}}
                                    <div id="import" class="modal">
                                        <form action="{{ route('admin.skemanonpnbp.import') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-content">
                                                <p>Import Excel Table 2 Skema Proposal Penelitian dan Pengabdian PNBP</p>
                                                <p>Untuk import data melalui excel, silahkan download template excel dan
                                                    sesuaikan masukan</p>
                                                <a href="{{ asset('template\rida\table_24_hibahpnbp_2017.xlsx') }}">Download
                                                    template</a>
                                                <h5><label for="skemanonpnbp" class="form-label">Upload file
                                                        excel</label></h5>
                                                <input type="file" name="skemanonpnbp">

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
                                    <div class="col s4 m4 l4">
                                        <a href="{{route ('admin.skemanonpnbp.details-5tahun') }}" class="waves-effect waves-light btn right modal-trigger"
                                            role="button">Lihat Perolehan 5 Periode Terakhir</a>
                                    </div>

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
                                            @foreach ($skemanonpnbp as $row)
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $row->periode }}</td>
                                                    <td>{{ $row->tahun_input }}</td>
                                                    <td>{{ $row->sumber_data }}</td>

                                                    <td>
                                                        <a href="{{ route('admin.skemanonpnbp.details', ['periode' => $row->periode, 'tahun_input' => $row->tahun_input]) }}"
                                                            class="btn"
                                                            style="background-color: grey;">Detail</a>
                                                        <a href="#edit{{ $row->id }}" class="btn modal-trigger"
                                                            style="background-color: green;">Edit</a>
                                                        <a href="#hapus{{ $row->id }}" class="btn modal-trigger"
                                                            style="background-color: red;">Delete</a>
                                                    </td>
                                                    <!-- Modal Edit -->
                                                    <div id="edit{{ $row->id }}" class="modal modal-fixed-footer">
                                                        <form
                                                            action="{{route('admin.skemanonpnbp.edit-periode')}}"
                                                            method="post">
                                                            @csrf
                                                            <input type="hidden" value="{{$row->periode}}" name="dbPeriode">
                                                            <input type="hidden" value="{{$row->tahun_input}}" name="dbtahun_input">
                                                            <input type="hidden" value="{{$row->sumber_data}}" name="dbsumber_data">
                                                            <div class="modal-content">
                                                                <h4>Edit Data</h4>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input value="{{ $row->periode }}" id="periode"
                                                                            name="periode" type="text"
                                                                            class="validate" required>
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
                                                    <div id="hapus{{ $row->id }}" class="modal">
                                                        <form
                                                            action="{{route('admin.skemanonpnbp.delete-periode')}}"
                                                            method="post">
                                                            @csrf
                                                            <input type="hidden" value="{{$row->periode}}" name="dbPeriode">
                                                            <input type="hidden" value="{{$row->tahun_input}}" name="dbtahun_input">
                                                            <div class="modal-content">
                                                                <h4>Delete Data</h4>
                                                                <hr>
                                                                <p>Anda yakin ingin menghapus data {{$row->tahun_input}} - {{ $row->periode }}?</p>
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
