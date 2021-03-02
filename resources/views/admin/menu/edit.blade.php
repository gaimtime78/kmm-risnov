@extends('layout.application')

@section('css')
  <style>
    .input-field div.error{
    position: relative;
    top: -1rem;
    left: 0rem;
    font-size: 0.8rem;
    color:#FF4081;
    -webkit-transform: translateY(0%);
    -ms-transform: translateY(0%);
    -o-transform: translateY(0%);
    transform: translateY(0%);
  }
  </style>
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
                    <h4 class="header2">Edit Menu</h4>
                    <div class="row">
                      <form class="col s12" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$menu->id}}">
                        <div class="row">
                          <div class="input-field col s12">
                            <input name="menu" placeholder="Masukkan Nama Menu" id="menu" type="text" value="{{$menu->menu}}">
                            <label for="menu">Nama Menu</label>
                            <div class="errorTxt">
                              @if($errors->has('menu'))
                              <div id="uname-error" class="error">{{ $errors->first('menu') }}</div>    
                              @endif
                            </div>
                          </div>
                        </div>
                        {{-- <div class="row">
                            <div class="input-field col s12">
                              <input name="sub_menu" placeholder="Masukkan Nama Sub Menu" id="sub_menu" type="text" value="{{$menu->sub_menu}}">
                              <label for="sub_menu">Nama Sub Menu</label>
                            </div>
                        </div> --}}
                        <div class="row">
                          <div class="input-field col s12">
                            <select name="sub_menu[]" multiple="multiple" id="sub_menu">
                              <option disabled="" value="" selected="">Choose your option
                              @foreach ($data as $row)
                                  @if ($row->id != $menu->id)
                                    <option value="{{$row->id}}">{{$row->menu}}        
                                  @endif
                              @endforeach
                            </select>
                            <label>Sub Menu</label>
                            <div class="errorTxt">
                              @if($errors->has('sub_menu'))
                              <div id="uname-error" class="error">{{ $errors->first('sub_menu') }}</div>    
                              @endif
                            </div>
                          </div>  
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                              <input name="url" placeholder="Masukkan URL" id="url" type="text" value="{{$menu->url}}">
                              <label for="url">URL</label>
                              <div class="errorTxt">
                                @if($errors->has('url'))
                                <div id="uname-error" class="error">{{ $errors->first('url') }}</div>    
                                @endif
                              </div>
                            </div>
                        </div>
                        <div class="row">
                          <h6>Icon Lama</h6>
                          <img src="{{url('uploads').'/'.$menu->icon}}" width="100" alt="{{$menu->menu}}">
                          <input type="hidden" name="old_icon" value="{{$menu->icon}}">
                        </div>
                        
                        <div class="row">
                          <h6>Icon Baru</h6>
                            <div class="file-field input-field">
                                <div class="btn">
                                  <span>Icon</span>
                                  <input name="new_icon" type="file">
                                </div>
                                <div class="file-path-wrapper">
                                  <input class="file-path validate" type="text">
                                </div>
                                <div class="errorTxt">
                                  @if($errors->has('new_icon'))
                                  <div id="uname-error" class="error">{{ $errors->first('new_icon') }}</div>    
                                  @endif
                                </div>
                              </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <select name="page_id" id="page_id">
                              <option value="" selected="">Choose your option
                              @foreach ($page as $row)
                                    <option value="{{$row->id}}" {{$menu->page_id == $row->id ? 'selected' : ''}}>{{$row->title}}        
                              @endforeach
                            </select>
                            <label>Page</label>
                            <div class="errorTxt">
                              @if($errors->has('page_id'))
                              <div id="uname-error" class="error">{{ $errors->first('page_id') }}</div>    
                              @endif
                            </div>
                          </div>  
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                              <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Edit Menu
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
  <script>
    $(document).ready(function(){
        $('select').material_select();
    });
  </script>
@endsection