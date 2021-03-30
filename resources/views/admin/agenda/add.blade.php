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


        <!--start container-->
        <div class="container">
          <div class="section">
            <!--Basic Form-->
            <div id="basic-form" class="section">
              <div class="row">
                <!-- Form with placeholder -->
                <div class="col s12 m12 l12">
                  <div class="card-panel">
                    <h4 class="header2">Tambah Agenda</h4>
                    <div class="row">
                      <form action="{{route('admin.agenda.store')}}" class="col s12" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                          <div class="input-field col s12">
                            <input name="title" class="@error('title') is-invalid @enderror" placeholder="Masukkan Nama Agenda" id="title" type="text">
                            <label for="title">Nama Agenda</label>
                            @error('title')
                            <div class="errorTxt1" style="font-size:0.8rem;color:red;">
                              <div id="uname-error " class="error">{{ $message }}
                              </div>
                            </div>
                            @enderror
                          </div>
                         
                        
                          <div class="mb-3" style="margin-left:8px">
                              <h5><label for="content" class="form-label">Tanggal Agenda</label></h5>
                              <div style="width:200px;"><input type="date" class="@error('date') is-invalid @enderror" name="date"></div>
                              @error('date')
                              <div class="errorTxt1" style="font-size:0.8rem;color:red;">
                                <div id="uname-error " class="error">{{ $message }}
                                </div>
                              </div>
                              @enderror
                          </div>
                          <div class="mb-3" style="margin-left:8px">
                              <h5><label for="content" class="form-label">Waktu Agenda</label></h5>
                              <div style="width:200px;"><input type="time" name="time"></div>
                          </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                              <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Buat agenda
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