@extends('layout.application')

@section('css')
    {{-- Select2 CSS --}}
    <link rel="stylesheet" href="{{ asset('css\select2.min.css') }}">
    <style>
        #actionBtn {
            display: inline;
        }

    </style>

    {{-- TinyMCE js --}}
    <script src="https://cdn.tiny.cloud/1/t62fq0838f1hd6wos3ckh1y04j1b4lyew06g54f7bl5m6fxg/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
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
                        <input type="text" name="Search" class="header-search-input z-depth-2"
                            placeholder="Explore Materialize">
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
                        <div class="card-panel">
                        <h1 class="mb-5 mt-5">Buat Page</h1>
                        <form action="{{ route('admin.page.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <h5><label for="useAsPost" class="form-label">Tampilkan post?</label></h5>
                                <input class="form-check-input" type="radio" name="use_post" id="use_post1" value=1>
                                <label class="form-check-label" for="use_post1">Ya</label>
                                <input class="form-check-input" type="radio" name="use_post" id="use_post0" value=0>
                                <label class="form-check-label" for="use_post0">Tidak</label>
                            </div>
                            <div class="mb-3">
                                <h5><label for="title" class="form-label">Judul Laman</label></h5>
                                <input type="text" name="title" id="title" class="form-control"
                                    placeholder="Masukkan judul laman di sini">
                            </div>
                            <div class="mb-3">
                                <h5><label for="post_category" class="form-label">Kategori Post</label></h5>
                                <select class="" name="post_category" style="max-width: 50%">
                                    <option></option>
                                    @foreach ($category as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->category }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <h5><label for="content" class="form-label">Konten</label></h5>
                                <textarea name="content" class="form-control" id="content"
                                    placeholder="Masukkan konten laman di sini"></textarea>
                            </div>
                            <button type="submit" class="waves-effect waves-light btn cyan darken-1">Simpan</button>
                        </form>
                    </div>
                    <br>
                    <div class="divider"></div>
                    <!--DataTables example Row grouping-->
                </div>
                <!--end container-->
            </section>

        <!-- END CONTENT -->
        </div>
    </div>

@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('js\select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js\tinyinit.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js\plugins\prism\prism.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.postCategory').select2({
                placeholder: 'Pilih kategori post untuk ditampilkan',
                minimumInputLength: 3,
                allowClear: true
            });
        });
        
    </script>
@endsection
