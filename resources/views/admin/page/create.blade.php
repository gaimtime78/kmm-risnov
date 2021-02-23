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

                        <h1 class="mb-5 mt-5">Buat Page</h1>
                        <form action="{{ route('admin.page.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <h5><label for="useAsPost" class="form-label">Tampilkan post?</label></h5>
                                <input class="form-check-input" type="radio" name="useAsPost" id="useAsPost1" value=1>
                                <label class="form-check-label" for="useAsPost1">Ya</label>
                                <input class="form-check-input" type="radio" name="useAsPost" id="useAsPost0" value=0>
                                <label class="form-check-label" for="useAsPost1">Tidak</label>
                            </div>
                            <div class="mb-3">
                                <h5><label for="title" class="form-label">Judul Laman</label></h5>
                                <input type="text" name="title" id="title" class="form-control"
                                    placeholder="Masukkan judul laman di sini">
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
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
            toolbar: 'insert a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table imageupload',
            toolbar_mode: 'floating',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            file_picker_types: 'file image media',
            height: 480,
            block_unsupported_drop: false,
            menubar:true,
            setup: function(editor) {
                let uploader = $('<input id="tinymce-uploader" type="file" accept="image/*" style="display:none">');
                uploader.on("change",function(){
                    let input = uploader.get(0);
                    let file = input.files[0];
                    let fr = new FileReader();
                    fr.onload = function() {
                        let img = new Image();
                        img.src = fr.result;
                        editor.insertContent(`<img src="${img.src}"/>`);
                        uploader.val('');
                    }
                    fr.readAsDataURL(file);
                });
                editor.ui.registry.addButton('insert', {
                    icon: 'image',
                    tooltip: 'Insert',
                    onAction: function (e){
                        uploader.trigger('click');
                    }
                });
            }
        });

    </script>
    <script type="text/javascript" src="{{ asset('js\plugins\prism\prism.js') }}"></script>
@endsection
