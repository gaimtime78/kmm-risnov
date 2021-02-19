<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Page</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sticky-footer/">



    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/apple-touch-icon.png"
        sizes="180x180">
    <link rel="icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32"
        type="image/png">
    <link rel="icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16"
        type="image/png">
    <link rel="manifest" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/safari-pinned-tab.svg"
        color="#7952b3">
    <link rel="icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

    </style>


    <!-- Custom styles for this template -->
    <link href="sticky-footer.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body class="d-flex flex-column h-100">

    <!-- Begin page content -->
    <main class="flex-shrink-0">
        <div class="container">
            @if (session('notification'))
                <div class="alert alert-success m-5" role="alert">
                    {{ session('notification') }}
                </div>
            @endif

            <h1 class="mt-5">Daftar Page</h1>
            <div class="row">
                <div class="col-md-10"></div>
                <div class="col-md-2">
                    <a href="{{ route('admin.page.create') }}" class="btn btn-success">Buat Page</a>
                </div>
            </div>
            <table class="table table-hover m-2">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Dibuat</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($pages as $page)
                        <tr>
                            <th scope="row">{{ $i }}</th>
                            <td>{{ $page->title }}</td>
                            <td>{{ $page->slug }}</td>
                            <td>{{ $page->created_at->diffForHumans() }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                <button type="button" class="btn btn-sm btn-primary">Edit</button>
                                <button type="button" class="btn btn-sm btn-danger">Delete</button>
                              </div>
                            </td>
                        </tr>
                        @php
                        $i++;
                    @endphp
                    @endforeach
                </tbody>
            </table>

        </div>
    </main>

    <footer class="footer mt-auto py-3 bg-light">
        <div class="container">
            <span class="text-muted">Place sticky footer content here.</span>
        </div>
    </footer>

    <script>
        $(document).ready(function() {
            $('.alert').fadeTo(2000, 500).slideUp(500, function() {
                $('.alert').slideUp(500);
            });
        });

    </script>
</body>

</html>
