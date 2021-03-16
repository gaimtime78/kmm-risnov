@extends('layout.user')

@section('css')

<style>
table {
    width: 100%;
    border-collapse: collapse;
}
td, th {
    border: 1px solid #ddd;
    padding: 8px;
}

th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #000;
  color: white;
  width: 150px;
}
</style>

@endsection

@section('content')
<section class="section db p120">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tagline-message page-title text-center">
                    <h3>List Mahasiswa KKN</h3>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end section -->

<section class="section gb nopadtop">
    <div class="container">
        <div class="boxed boxedp4">
            <div class="row">
                <div class="pull-left">
                    <div class="col-md-12">
                        <div class="row blog-grid">
                            <div class="col-md-12">
                                <table>
                                    <thead>
                                    <tr>
                                        <th data-field="id">Nama</th>
                                        <th data-field="name">NIM</th>
                                        <th data-field="price">Jurusan</th>
                                        <th data-field="price">Wilayah/ Kota</th>
                                        <th data-field="price">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Alvin</td>
                                        <td>M0518001</td>
                                        <td>Informatika</td>
                                        <td>Surakarta</td>
                                        <td><button>Lihat Detail</button></td>
                                    </tr>
                                    <tr>
                                        <td>Alan</td>
                                        <td>M0518001</td>
                                        <td>Informatika</td>
                                        <td>Surakarta</td>
                                        <td><button>Lihat Detail</button></td>
                                    </tr>
                                    <tr>
                                        <td>Jonathan</td>
                                        <td>M0518001</td>
                                        <td>Informatika</td>
                                        <td>Surakarta</td>
                                        <td><button>Lihat Detail</button></td>
                                    </tr>
                                    <tr>
                                        <td>Shannon</td>
                                        <td>M0518001</td>
                                        <td>Informatika</td>
                                        <td>Surakarta</td>
                                        <td><button>Lihat Detail</button></td>
                                    </tr>
                                    <tr>
                                        <td>Shannon</td>
                                        <td>M0518001</td>
                                        <td>Informatika</td>
                                        <td>Surakarta</td>
                                        <td><button>Lihat Detail</button></td>
                                    </tr>
                                    <tr>
                                        <td>Shannon</td>
                                        <td>M0518001</td>
                                        <td>Informatika</td>
                                        <td>Surakarta</td>
                                        <td><button>Lihat Detail</button></td>
                                    </tr>
                                    <tr>
                                        <td>Shannon</td>
                                        <td>M0518001</td>
                                        <td>Informatika</td>
                                        <td>Surakarta</td>
                                        <td><button>Lihat Detail</button></td>
                                    </tr>
                                    <tr>
                                        <td>Shannon</td>
                                        <td>M0518001</td>
                                        <td>Informatika</td>
                                        <td>Surakarta</td>
                                        <td><button>Lihat Detail</button></td>
                                    </tr>
                                    <tr>
                                        <td>Shannon</td>
                                        <td>M0518001</td>
                                        <td>Informatika</td>
                                        <td>Surakarta</td>
                                        <td><button>Lihat Detail</button></td>
                                    </tr>
                                    <tr>
                                        <td>Shannon</td>
                                        <td>M0518001</td>
                                        <td>Informatika</td>
                                        <td>Surakarta</td>
                                        <td><button>Lihat Detail</button></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <br>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->
                </div>

                <div class="pull-right">
                    <div class="col-md-12">
                        <div class="tagline-message page-title text-left">
                            <h3>Search</h3>
                        </div>
                        <form class="form-inline" role="search">
                            <div class="form-1">
                                <input type="text" class="form-control" placeholder="NIM">
                            </div>
                            <br>
                            <div class="form-1">
                                <input type="text" class="form-control" placeholder="Wilayah/ Kota">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">SEARCH</button>
                        </form>
                    </div><!-- end col -->
                </div>

                <div class="col-md-12">
                    <div class="row blog-grid">
                        <div class="col-md-12">
                            <ul class="pagination">
                                <li class="disabled"><a href="javascript:void(0)">&laquo;</a></li>
                                <li class="active"><a href="javascript:void(0)">1</a></li>
                                <li><a href="javascript:void(0)">2</a></li>
                                <li><a href="javascript:void(0)">3</a></li>
                                <li><a href="javascript:void(0)">...</a></li>
                                <li><a href="javascript:void(0)">&raquo;</a></li>
                            </ul>
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end col -->

            </div><!-- end row -->
        </div><!-- end boxed -->
    </div><!-- end container -->
</section>
@endsection

@section('js')

@endsection