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
            <h4 class="header left">Tabel 6 RENTANG USIA PRODUKTIF PENELITI DAN PENGABDI JENJANG PROFESI
</h4>
            <!-- <a href="{{route('admin.agenda.create')}}" class="waves-effect waves-light btn-large right"><i class="mdi-content-add left"></i>Tambah Agenda</a> -->
            <div class="row">
              <div class="col s12 m12 l12">
                <a href="#import" class="waves-effect waves-light btn right modal-trigger" role="button">Upload Excel</a>
                <a href="{{route('admin.penelitipengabdiprofesi.export')}}" class="waves-effect waves-light btn right" role="button">Export Excel</a>

                {{-- Modal import --}}
                <div id="import" class="modal">
                  <form action="{{route('admin.penelitipengabdiprofesi.import')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">
                      <h4>Import Data</h4>
                      <p>Untuk import data melalui excel, silahkan download template excel dan sesuaikan masukan</p>
                      <!-- <a href="{{asset('template\template_agenda.xlsx')}}">Download template</a> -->
                        <h5><label for="agendas" class="form-label">Upload file excel</label></h5>
                        <input type="file" name="penelitipengabdiprofesi">

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
                          <th>Periode</th>
                          <th>Tanggal</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    @php
                      $i = 1;
                    @endphp
                      @foreach ($penelitipengabdiprofesi as $row)
                      <tr>
                          <td>{{$i}}</td>
                          <td>{{$row->fakultas}}</td>
                          <td>{{$row->periode}}</td>
                          <td>{{$row->jenjang}}</td>
                         
                          <td><a href="{{route('admin.penelitipengabdiprofesi.pilihperiode' , $row->fakultas )}}" class="btn" style="background-color: grey;">Detail</a></td>
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