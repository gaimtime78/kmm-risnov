@extends('layout.application')

@section('css')
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

                        <h1 class="mb-5 mt-5">Edit Page</h1>
                        <form action="{{ route('admin.page.update', [$page->id]) }}" method="post"
                            enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="mb-3">
                                <h5><label for="useAsPost" class="form-label">Tampilkan post?</label></h5>
                                @if ($page->use_post == 1)
                                    <input class="form-check-input" type="radio" name="useAsPost" id="useAsPost1" value=1
                                        checked>
                                    <label class="form-check-label" for="useAsPost1">Ya</label>
                                    <input class="form-check-input" type="radio" name="useAsPost" id="useAsPost0" value=0>
                                    <label class="form-check-label" for="useAsPost1">Tidak</label>
                                @else
                                    <input class="form-check-input" type="radio" name="useAsPost" id="useAsPost1" value=1>
                                    <label class="form-check-label" for="useAsPost1">Ya</label>
                                    <input class="form-check-input" type="radio" name="useAsPost" id="useAsPost0" value=0
                                        checked>
                                    <label class="form-check-label" for="useAsPost1">Tidak</label>
                                @endif
                            </div>
                            <div class="mb-3">
                                <h5><label for="title" class="form-label">Judul Laman</label></h5>
                                <input type="text" name="title" id="title" class="form-control"
                                    placeholder="Masukkan judul laman di sini" value="{{ $page->title }}">
                            </div>
                            <div class="mb-3">
                                <h5><label for="content" class="form-label">Konten</label></h5>
                                <textarea name="content" class="form-control" id="content"
                                    placeholder="Masukkan konten laman di sini">{{ $page->content }}</textarea>
                            </div>
                            <button type="submit" class="waves-effect waves-light btn cyan darken-1">Simpan</button>
                        </form>
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
                            <li><a href="css-helpers.htm" class="btn-floating red"><i
                                        class="large mdi-communication-live-help"></i></a></li>
                            <li><a href="app-widget.htm" class="btn-floating yellow darken-1"><i
                                        class="large mdi-device-now-widgets"></i></a></li>
                            <li><a href="app-calendar.htm" class="btn-floating green"><i
                                        class="large mdi-editor-insert-invitation"></i></a></li>
                            <li><a href="app-email.htm" class="btn-floating blue"><i
                                        class="large mdi-communication-email"></i></a></li>
                        </ul>
                    </div>
                    <!-- Floating Action Button -->
                </div>
                <!--end container-->
            </section>

            <!-- END CONTENT -->
        </div>
    </div>

@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('js\tinyinit.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js\plugins\prism\prism.js') }}"></script>
@endsection
