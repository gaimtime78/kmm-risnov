@extends('layout.application')

@section('css')
    <style>
        #actionBtn {
            display: inline;
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
                            <h1 class="mb-5 mt-5">Edit Banner</h1>
                            <form action="{{ route('admin.banner.update', [$banner->id]) }}" method="post" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="mb-3">
                                    <h5><label for="content_type" class="form-label">Tipe Banner</label></h5>
                                    @if ($banner->content_type == 'gambar')
                                        <input class="form-check-input" type="radio" name="content_type" id="content_type1"
                                            value='video'>
                                        <label class="form-check-label" for="content_type1">Video</label>
                                        <input class="form-check-input" type="radio" name="content_type" id="content_type0"
                                            value='gambar' checked>
                                        <label class="form-check-label" for="content_type0">Gambar</label>
                                    @else
                                        <input class="form-check-input" type="radio" name="content_type" id="content_type1"
                                            value='video' checked>
                                        <label class="form-check-label" for="content_type1">Video</label>
                                        <input class="form-check-input" type="radio" name="content_type" id="content_type0"
                                            value='gambar'>
                                        <label class="form-check-label" for="content_type0">Gambar</label>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <h5><label for="content[]" class="form-label">Upload Konten</label></h5>
                                    <div class="file-field input-field">
                                        <div class="btn">
                                            <span>Browse</span>
                                            <input name="content[]" type="file" multiple />
                                        </div>

                                        <div class="file-path-wrapper">
                                            <input name="content_path" class="file-path validate" type="text"
                                                placeholder="Upload multiple files" />
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <h5><label for="status" class="form-label">Status</label></h5>
                                    <!-- Switch -->
                                    <div class="switch">
                                        <label>
                                            @if ($banner->status == 1)
                                                <input type="checkbox" name="status" checked>
                                            @else
                                                <input type="checkbox" name="status">
                                            @endif
                                            <span class="lever"></span>
                                        </label>
                                    </div>
                                </div>
                                <br>
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
    <script type="text/javascript" src="{{ asset('js\plugins\prism\prism.js') }}"></script>
@endsection
