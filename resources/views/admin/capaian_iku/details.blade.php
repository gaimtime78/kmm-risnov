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
          
            <h4 class="header left">Tabel 1 Perkembangan Capaian IKU Universitas Sebelas Maret</h4>
            <!-- <a href="{{route('admin.agenda.create')}}" class="waves-effect waves-light btn-large right"><i class="mdi-content-add left"></i>Tambah Agenda</a> -->
            <div class="row">
              <div class="col s12 m12 l12">
              
                <table id="data-menu" class="table display" cellspacing="0">
                  <thead>
                      <tr>
                          <th style="text-align:justify !important;">No</th>
                          <th style="text-align:justify !important;">Detail Target</th>
                          <th style="text-align:justify !important;">Satuan</th>
                          <th style="text-align:justify !important;">Target</th>
                          <th style="text-align:justify !important;">Capaian</th>
                          <th style="text-align:justify !important;">%</th>
                          <th style="text-align:justify !important;">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                  @php
                      $i = 1;
                    @endphp
                      @foreach ($iku as $row)
                      <tr>
                          <td style="text-align:center !important;">{{$row->no}}</td>
                          <td style="text-align:center !important;">{{$row->detail_target}}</td>
                          <td style="text-align:center !important;">{{$row->satuan}}</td>
                          <td style="text-align:center !important;">{{$row->target}}</td>
                          <td style="text-align:center !important;">{{$row->capaian}}</td>
                          <td style="text-align:center !important;">{{$row->percenttotal}}%</td>
                          
                          <td><a href="#" class="btn modal-trigger" style="background-color: orange;">Edit</a>   </td>
                          <!-- Modal Edit -->
                          <div id="#" class="modal modal-fixed-footer">
                            <form action="#" method="post">
                              @csrf
                              <div class="modal-content">
                                <h4>Edit Data</h4>
                                <hr>
                                <div class="row">
                                  <div class="input-field col s12">
                                    <input value="{{$row->title}}" id="title" name="title"  type="text" class="validate" required>
                                    <label for="title">RIDA title</label>
                                  </div>
                                </div>
                                
                                <div class="row">
                                  <div class="mb-3" style="margin-left:8px">
                                    <label for="date">Rida date</label>
                                    <input value="{{$row->date}}" id="date"  name="date"  type="date" class="validate" required>
                                  </div>
                                </div>
                                
                                <div class="row">
                                  <div class="mb-3" style="margin-left:8px">
                                    <label for="time">Rida time</label>
                                    <input value="{{$row->time}}" id="time"  name="time"  type="time" class="validate" required>
                                  </div>
                                </div>
                                
                                
                                
                              </div>
                              <div class="modal-footer">
                                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
                                <button type="submit" class="modal-close waves-effect waves-green btn-flat">Update</button>
                              </div>
                            </form>
                          </div>
                          <!-- Modal Hapus -->
                          <div id="hapus" class="modal">
                            <form action="#" method="get">
                              @csrf
                              <div class="modal-content">
                                <h4>Delete Data IKU</h4>
                                <hr>
                                <p>Anda yakin ingin menghapus data {{$row->title}}?</p>
                                <div class="modal-footer">
                                  <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
                                  <button type="submit" class="modal-close waves-effect waves-green btn-flat">Delete</button>
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