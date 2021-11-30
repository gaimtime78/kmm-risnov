@extends('layout.application')

@section('css')
  
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
                <h5 class="breadcrumbs-title">Forms</h5>
                <ol class="breadcrumbs">
                  <li><a href="index.htm">Dashboard</a>
                  </li>
                  <li><a href="#">Forms</a>
                  </li>
                  <li class="active">Forms Layouts</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->


        <!--start container-->
        <div class="container">
          <div class="section">
            <!--Basic Form-->
            <div id="basic-form" class="section">
              <div class="row">
                <!-- Form with placeholder -->
                <div class="col s12 m12 l12">
                  <div class="card-panel">
                    <h4 class="header2">Tambah Playlist</h4>
                    <div class="row">
                      <form class="col s12" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                          <div class="input-field col s12">
                            <input name="playlist_name" placeholder="Masukkan Nama Playlist" id="playlist_name" type="text">
                            <label for="playlist_name">Nama Playlist</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input name="video_ids" placeholder="Masukkan ID video (dipisahkan dengan tanda koma)" id="video_ids" type="text">
                            <label for="video_ids">Video ID List</label>
                          </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                              <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Buat Playlist
                                <i class="mdi-content-send right"></i>
                              </button>
                            </div>
                          </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
  </section>
  <!-- END CONTENT -->
   
@endsection

@section('js')

@endsection