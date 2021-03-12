@extends('layout.application')

@section('css')
    <link href="{{ asset('js\plugins\data-tables\css\jquery.dataTables.min.css') }}" type="text/css" rel="stylesheet"
        media="screen,projection">

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
                            <div class="alert" style="background-color: #aee8e2; border-radius:10px; padding:10px; margin-bottom:10px;">
                                <b>{{ session('message') }}</b>
                            </div>
                        @endif

                        <div id="table-datatables">
                            <h4 class="header left">Banner</h4>
                            <a href="{{ route('admin.banner.create') }}" class="waves-effect waves-light btn-large right"><i
                                    class="mdi-content-add left"></i>Tambah Banner</a>
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <table id="data-menu" class="responsive-table display" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Jenis Banner</th>
                                                <th>Filename</th>
                                                <th>Created</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($banner as $item)
                                                <tr>
                                                    <th scope="row">{{ $i }}</th>
                                                    <td>{{ $item->content_type }}</td>
                                                    <td>{{ $item->filenames }}</td>
                                                    <td>{{ $item->created_at->diffForHumans() }}</td>
                                                    <td>
                                                        <form id="actionBtn"
                                                            action="{{ route('admin.banner.edit', [$item->id]) }}"
                                                            method="get">
                                                            @csrf
                                                            <button type="submit"
                                                                class="waves-effect waves-light btn cyan darken-1">Edit</button>
                                                        </form>
                                                        <form id="actionBtn"
                                                            action="{{ route('admin.banner.delete', [$item->id]) }}"
                                                            method="post">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit"
                                                                class="waves-effect waves-light btn red darken-1">Hapus</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @php
                                                    $i++;
                                                @endphp
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
        $(document).ready(function() {
            $('.alert').fadeTo(2000, 500).slideUp(500, function() {
                $('.alert').slideUp(500);
            });
        });

    </script>
    <script type="text/javascript" src="{{ asset('js\plugins\prism\prism.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js\plugins\data-tables\js\jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js\plugins\data-tables\data-tables-script.js') }}"></script>
@endsection
