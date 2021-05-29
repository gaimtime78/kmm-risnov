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
                        <div style="padding:1em;" class="col s12 m12 l12">
                            <div style="padding:2em;" class="card-panel">
                                <h1 class="mb-5 mt-5">Buat Role</h1>
                                <div class="divider" style="margin-bottom:2em;"></div>
                                <form action="{{ route('admin.permission.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <h5><label for="title" class="form-label">Nama</label></h5>
                                        <input type="text" name="name" id="title" class="form-control"
                                            placeholder="Masukkan Nama user di sini">
                                    </div>
                                    <div class="mb-3" id="permissionDD"></div>
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
        //Source code fungsi dibwah ini ada di public/js/multiple-dropdown.js
        // initTinyMCE('#content-mce')
        let permission = {!! json_encode($permission)!!}
        console.log(permission, "AHAH")
        let optList = permission.map(v => ({value:v.id, text:v.permission}))
        initMulDrop({
            selector:'#permissionDD',
            name:'permission',
            label:'Select Permission :',
            options:optList,
            initialValue:[],
            single:false
        })
    </script>
@endsection
