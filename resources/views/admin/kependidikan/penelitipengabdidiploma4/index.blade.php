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
           <!-- START CONTENT -->
    <section id="content">
      <!--breadcrumbs start-->
      <div id="breadcrumbs-wrapper">
          <!-- Search for small screen -->
        <div class="header-search-wrapper grey hide-on-large-only">
            <i class="mdi-action-search active"></i>
            <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
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
            <h4 class="header left">Tabel 10 @foreach ($nama_table as $name) {{ $name->nama_table }} @endforeach</h4>
            <!-- <a href="{{route('admin.agenda.create')}}" class="waves-effect waves-light btn-large right"><i class="mdi-content-add left"></i>Tambah Agenda</a> -->
            <div class="row">
              <div class="col s12 m12 l12">
                <a href="#import" class="waves-effect waves-light btn right modal-trigger" role="button">Upload Excel</a>
                <a href="#update_nama_table" class="waves-effect waves-light btn right modal-trigger" role="button">Edit Nama Table</a>

                {{-- Modal update nama table --}}
                <div id="update_nama_table" class="modal">
                @foreach ($nama_table as $name) 
                  <form action="{{route('admin.penelitipengabdikependidikandiploma4.updateNamaTable', [$name->nama_table] )}}" method="post" enctype="multipart/form-data" >
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
                  <form action="{{route('admin.penelitipengabdikependidikandiploma4.import')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">
                      <h4>Import Data</h4>
                      <p>Untuk import data melalui excel, silahkan download template excel dan sesuaikan masukan</p>
                      <a href="{{asset('template\rida\table_10_peneliti_pengabdi_kependidikan_diploma4.xlsx')}}">Download template</a>
                        <h5><label for="agendas" class="form-label">Upload file excel</label></h5>
                        <input type="file" name="penelitipengabdidiploma4">

                        <h5><label for="tahun" class="form-label">Tahun</label></h5>
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
                          <th>Fakultas</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    @php
                      $i = 1;
                    @endphp
                      @foreach ($penelitipengabdidiploma4 as $row)
                      <tr>
                          <td>{{$i}}</td>
                          <td>{{$row->fakultas}}</td>
                          <td><a href="{{route('admin.penelitipengabdikependidikandiploma4.pilihperiode' , $row->fakultas )}}" class="btn" style="background-color: grey;">Detail</a></td>
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