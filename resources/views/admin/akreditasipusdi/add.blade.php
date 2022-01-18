@extends('layout.application')

@section('css')
{{-- TinyMCE js --}}
<script src="https://cdn.tiny.cloud/1/t62fq0838f1hd6wos3ckh1y04j1b4lyew06g54f7bl5m6fxg/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
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
                                        <h4 class="header2">Tambah Data</h4>
                                        <div class="row">
                                        <div class="row">
              <div class="col s12 m12 l12">
                <a href="#import" class="waves-effect waves-light btn right modal-trigger" role="button">Import</a>
                <a href="{{route('admin.rida.export')}}" class="waves-effect waves-light btn right" role="button">Export</a>

                {{-- Modal import --}}
                <div id="import" class="modal">
                  <form action="{{route('admin.akreditasipusdi.import')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">
                      <h4>Import Akreditasi Pusat Studi</h4>
                      <p>Untuk import akreditasi pusat studi melalui excel, silahkan download template excel dan sesuaikan masukan</p>
                      <a href="{{asset('template\template_akreditasi_pusdi.xlsx')}}">Download template</a>
                      <h5><label for="akreditasipusdis" class="form-label">Upload file excel</label></h5>
                      <input type="file" name="akreditasipusdis">
                    </div>
                    <div class="modal-footer">
                      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
                      <button type="submit" class="waves-effect waves-green btn">Submit</button>
                    </div>
                  </form>
                </div>
                {{-- End of modal import --}}

                                            <form action="{{ route('admin.akreditasipusdi.store') }}" class="col s12" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="input-field col s12">
                                                        <input name="title" class="@error('title') is-invalid @enderror"
                                                            placeholder="Masukkan Nama Akreditasi Pusat Studi" id="title" type="text">
                                                        <label for="title">Nama Akreditasi Pusat Studi</label>
                                                        @error('title')
                                                            <div class="errorTxt1" style="font-size:0.8rem;color:red;">
                                                                <div id="uname-error " class="error">{{ $message }}
                                                                </div>
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3" style="margin-left: 8px">
                                                        <h5><label for="content" class="form-label">Thumbnail</label></h5>
                                                        <input type="file" name="thumbnail" id="thumbnail"
                                                            class="form-control" placeholder="Masukkan gambar">
                                                    </div>
                                                    <div class="mb-3" style="margin-left: 8px">
                                                        <div style="margin-top:2em;" class="switch">
                                                            <label>
                                                                Tampilkan Thumbnail
                                                                <input name="show_thumbnail" checked="checked"
                                                                    type="checkbox">
                                                                <span class="lever"></span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="mb-3" style="margin-left:8px">
                                                        <h5><label for="content" class="form-label">Tanggal Akreditasi Pusat Studi</label>
                                                        </h5>
                                                        <div style="width:200px;"><input type="date"
                                                                class="@error('date') is-invalid @enderror" name="date">
                                                        </div>
                                                        @error('date')
                                                            <div class="errorTxt1" style="font-size:0.8rem;color:red;">
                                                                <div id="uname-error " class="error">{{ $message }}
                                                                </div>
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3" style="margin-left:8px">
                                                        <h5><label for="content" class="form-label">Waktu Akreditasi Pusat Studi</label>
                                                        </h5>
                                                        <div style="width:200px;"><input type="time" name="time"></div>
                                                    </div>

                                                    <div class="mb-3" style="margin-left: 8px">
                                                        <h5><label for="content" class="form-label">Deskripsi</label></h5>
                                                        <textarea name="description" class="form-control" id="content-mce" placeholder="Tuliskan deskripsi"></textarea>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="input-field col s12">
                                                        <button class="btn cyan waves-effect waves-light right"
                                                            type="submit" name="action">Buat akreditasi pusat studi
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
            <script type="text/javascript" src="{{ asset('js\tinyinit.min.js') }}"></script>
            <script>
              initTinyMCE('#content-mce')
            </script>
        @endsection
