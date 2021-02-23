@extends('layout.application')

@section('css')
<link href="{{ asset('js/plugins/data-tables/css/jquery.dataTables.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
@endsection

@section('js')
<script type="text/javascript" src="{{ asset('js/plugins/data-tables/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/plugins/data-tables/data-tables-script.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/tinymce.min.js') }}"></script>
<script>
    tinymce.init({
        selector: '#tinymce'
    });
    $("#createPost").validate({
        rules: {
            title: "required",
            content: "required",
        },
        errorElement: 'div',
        errorPlacement: function(error, element) {
            var placement = $(element).data('error');
            if (placement) {
                $(placement).append(error)
            } else {
                error.insertAfter(element);
            }
        }
    });
</script>
@endsection

@section('content')
@include('layout.navbar')
<!-- START MAIN -->
<div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">
        @include('layout.menu')
        <!--DataTables example-->
        <div id="table-datatables">
            <h4 class="header">Create Berita</h4>
            <div class="row">
                <div class="col12">
                    <div class="card-panel">
                        <div class="row">
                            <div class="input-field col left">
                                <a href="{{ route('admin.post.index') }}">
                                    <button class="btn blue waves-effect waves-light right" type="submit" name="action">BACK
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="row">

                            @if ($errors->any())
                            @foreach($errors->all() as $error)
                            <div style="color: red">{{ $error }}</div>
                            @endforeach
                            @endif
                        </div>
                        <div class="row">
                            <form id="createPost" class="col s12" method="post" action="{{ route('admin.post.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="name" name="title" type="text">
                                        <label for="first_name">Judul</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea id="tinymce" name="content"></textarea>
                                        <label for="message">Konten</label>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Submit
                                                <i class="mdi-content-send right"></i>
                                            </button>
                                        </div>
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
@endsection