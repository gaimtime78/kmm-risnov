@extends('layout.user')

@section('content')
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 shop-media">
                <div class="row">
                    <div class="col-md-12">
                        <div class="image-wrap entry">
                            <img style="width:60%" src="{{asset('design/upload/course_03.jpg')}}" alt="foto mahasiswa" class="img-responsive">
                        </div><!-- end image-wrap -->
                    </div>
                </div><!-- end row -->

                <hr class="invis">

                
            </div><!-- end col -->

            <div class="col-md-6">
                <div class="shop-desc">
                    <h3>Nama Mahasiswa</h3>
                    <small>NIM Mahasiswa</small>
                    <p><i class="fa fa-book"></i> Tema yang diambil</p>
                    <p><i class="fa fa-building-o"></i> Penempatan</p>
                    <p><i class="fa fa-clock-o"></i> Tanggal KKN</p>
                    <div class="shop-meta">
                        <a href="{{route('informasi')}}" class="btn btn-primary">Back To Informasi</a>
                        <!-- <ul class="list-inline">
                            <li> SKU: product-111</li>
                            <li>Categories: <a href="#">Bags</a>
                        </ul> -->
                    </div><!-- end shop meta -->
                </div><!-- end desc -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div>
</section>

@endsection

@section('js')

@endsection