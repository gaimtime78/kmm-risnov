@extends('layout.application')

@section('css')
<link href="{{asset('js\plugins\data-tables\css\jquery.dataTables.min.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
@endsection

@section('content')

@include('layout.navbar')

<!-- START MAIN -->
<div id="main">
<!-- START WRAPPER -->
<div class="wrapper">
@include('layout.menu')
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
            <div class="row">
              <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title">Basic Tables</h5>
                <ol class="breadcrumbs">
                    <li><a href="index.htm">Dashboard</a></li>
                    <li><a href="#">Tables</a></li>
                    <li class="active">Basic Tables</li>
                </ol>
              </div>
            </div>
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
              <h4 class="header left">Category</h4>
              <a href="{{route('admin.category.add')}}" class="waves-effect waves-light btn-large right"><i class="mdi-content-add left"></i>Tambah Category</a>
              <div class="row">
                <div class="col s12 m12 l12">
                  <table id="data-menu" class="responsive-table display" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category</th>
                            <th>Ditambahkan</th>
                            <th>Terakhir Diubah</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                 
                 
                    <tbody>
                      @php
                        $i = 1;
                      @endphp
                        @foreach ($category as $row)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$row->category}}</td>
                            <td>{{$row->created_at->diffForHumans()}}</td>
                            <td>{{$row->updated_at->diffForHumans()}}</td>
                            <td><a href="#modal{{$row->id}}" class="btn modal-trigger" style="background-color: orange;">Edit</a>   <a href="#hapus{{$row->id}}" class="btn modal-trigger" style="background-color: red;">Delete</a></td>
                            <!-- Modal Edit -->
                            <div id="modal{{$row->id}}" class="modal modal-fixed-footer">
                            <div class="modal-content">
                              <h4>Edit Category</h4>
                              <hr>
                              <div class="row">
                                <div class="input-field col s12">
                                  <input disabled value="{{$row->category}}" id="disabled" type="text" class="validate">
                                  <label for="disabled">Current Category's Name</label>
                                </div>
                              </div>
                              <form action="{{route('admin.category.update', [$row->id])}}" method="post">
                              @csrf
                              <div class="row">
                                <div class="input-field col s12">
                                  <input placeholder="Insert New Name For This Category" name="newCategory" id="newCategory" type="text" class="validate">
                                  <label for="newCategory">New Category's Name</label>
                                </div>
                                <input type="hidden" name="idCategory" value="{{$row->id}}">
                              </div>
                            </div>
                            <div class="modal-footer">
                              <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
                              <button type="submit" class="modal-close waves-effect waves-green btn-flat">Update</button>
                            </form>
                            </div>
                            </div>

                            <!-- Modal Hapus -->
                            <div id="hapus{{$row->id}}" class="modal">
                            <div class="modal-content">
                              <h4>Delete Category</h4>
                              <hr>
                              <p>Anda yakin ingin menghapus category {{$row->category}}?</p>
                              <form action="{{route('admin.category.delete', [$row->id])}}" method="get">
                              @csrf
                            <div class="modal-footer">
                              <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
                              <button type="submit" class="modal-close waves-effect waves-green btn-flat">Delete</button>
                            </form>
                            </div>
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
          <!-- Floating Action Button -->
            <div class="fixed-action-btn" style="bottom: 50px; right: 19px;">
                <a class="btn-floating btn-large">
                  <i class="mdi-action-stars"></i>
                </a>
                <ul>
                  <li><a href="css-helpers.htm" class="btn-floating red"><i class="large mdi-communication-live-help"></i></a></li>
                  <li><a href="app-widget.htm" class="btn-floating yellow darken-1"><i class="large mdi-device-now-widgets"></i></a></li>
                  <li><a href="app-calendar.htm" class="btn-floating green"><i class="large mdi-editor-insert-invitation"></i></a></li>
                  <li><a href="app-email.htm" class="btn-floating blue"><i class="large mdi-communication-email"></i></a></li>
                </ul>
            </div>
            <!-- Floating Action Button -->
        </div>
        <!--end container-->

      </section>
      <!-- END CONTENT -->
   
@endsection

@section('js')
    <script type="text/javascript" src="{{asset("js\plugins\prism\prism.js")}}"></script>
    <script type="text/javascript" src="{{asset("js\plugins\data-tables\js\jquery.dataTables.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("js\plugins\data-tables\data-tables-script.js")}}"></script>
@endsection