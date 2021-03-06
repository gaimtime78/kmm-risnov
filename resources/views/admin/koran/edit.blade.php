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
                <!--start container-->
                <div class="container">
                    <div class="section">
                        <!--DataTables example-->
                        @if (session('message'))
                            <div style="background-color: #aee8e2; border-radius:10px; padding:10px; margin-bottom:10px;">
                                <b>{{ session('message') }}</b>
                            </div>
                        @endif
                        <div class="col s12 m12 l12">
                            <div class="card-panel">
                                <h1 class="mb-5 mt-5">Edit Post</h1>
                                <div class="divider" style="margin-bottom:2em;"></div>
                                <form action="{{ route('admin.koran.update', [$koran->id]) }}" method="post" enctype="multipart/form-data">
																		@method('put')
                                    @csrf
                                    <div class="mb-3">
                                        <h5><label for="title" class="form-label">Judul Post</label></h5>
                                        <input value="{{$koran->title}}" type="text" name="title" id="title" class="form-control"
                                            placeholder="Masukkan judul laman di sini">
                                    </div>
                                    <div class="mb-3">
                                        <h5><label for="source" class="form-label">Sumber Koran</label></h5>
                                        <input value="{{$koran->source}}" type="text" name="source" id="source" class="form-control"
                                            placeholder="Masukkan sumber koran di sini">
                                    </div>
                                    <div class="mb-3">
                                        <h5><label for="content" class="form-label">Konten</label></h5>
                                        <textarea name="content" class="form-control" id="content-mce"
                                            placeholder="Masukkan konten laman di sini">{{$koran->content}}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <h5><label for="content" class="form-label">Tanggal Publikasi</label></h5>
                                        <div style="width:200px;"><input value="{{$koran->published_at}}" type="date" name="published_at"></div>
                                    </div>
                                    <div class="mb-3">
                                        <div style="margin-top:2em;" class="switch">
                                            <label>
                                            active
                                            <input name="active" {{$koran->active?'checked':''}} type="checkbox">
                                            <span class="lever"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <button style="margin-top:2em;" type="submit" class="waves-effect waves-light btn primary darken-1">Simpan</button>
                                </form>
                            </div>
                        </div>
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
    <script type="text/javascript" src="{{ asset('js\multiple-dropdown.js') }}"></script>
    <script>
		// initTinyMCE('#content-mce')
    </script>
@endsection
