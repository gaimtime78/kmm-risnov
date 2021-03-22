@extends('layout.user')

@section('css')

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

            <div class="col-md-12">
                <div class="sidebar col-md-4">
                    <div class="tagline-message page-title text-left">
                        <h4>Search</h4>
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
                            <div class="form-1">        
                                <button type="submit" class="btn btn-primary">SEARCH</button>
                            </div>
                        </form>
                    <br>
                </div>
                
                <div class="col-md-8">

                    <div class="col-md-4">
                        <div class="course-box shop-wrapper">
                            <div class="image-wrap entry">
                                <img src="{{asset('images/logo-uns.png')}}" alt="" class="img-responsive">
                                <div class="magnifier">
                                    <a href="{{route('mahasiswa-kkn.detail')}}" title=""><i class="flaticon-add"></i></a>
                                </div>
                            </div>
                            <!-- end image-wrap -->
                            <div class="course-details shop-box text-center">
                                <h4>
                                    Nama Mahasiswa
                                    <small>Jurusan</small>
                                    <small>NIM</small>
                                    <small>Wilayah/Kota</small>
                                </h4>
                            </div>
                            <!-- end details -->
                            <div class="course-footer clearfix">
                                <div class="pull-left">
                                    <ul class="list-inline">
                                        <li><a href="{{route('mahasiswa-kkn.detail')}}" class="readmore"></i> Lihat Detail</a></li>
                                    </ul>
                                </div><!-- end left -->
                            </div><!-- end footer -->
                        </div><!-- end box -->
                    </div><!-- end col -->
                    <div class="col-md-4">
                        <div class="course-box shop-wrapper">
                            <div class="image-wrap entry">
                                <img src="{{asset('images/logo-uns.png')}}" alt="" class="img-responsive">
                                <div class="magnifier">
                                    <a href="{{route('mahasiswa-kkn.detail')}}" title=""><i class="flaticon-add"></i></a>
                                </div>
                            </div>
                            <!-- end image-wrap -->
                            <div class="course-details shop-box text-center">
                                <h4>
                                    Nama Mahasiswa
                                    <small>Jurusan</small>
                                    <small>NIM</small>
                                    <small>Wilayah/Kota</small>
                                </h4>
                            </div>
                            <!-- end details -->
                            <div class="course-footer clearfix">
                                <div class="pull-left">
                                    <ul class="list-inline">
                                        <li><a href="{{route('mahasiswa-kkn.detail')}}" class="readmore"> Lihat Detail</a></li>
                                    </ul>
                                </div><!-- end left -->
                            </div><!-- end footer -->
                        </div><!-- end box -->
                    </div><!-- end col -->
                    <div class="col-md-4">
                        <div class="course-box shop-wrapper">
                            <div class="image-wrap entry">
                                <img src="{{asset('images/logo-uns.png')}}" alt="" class="img-responsive">
                                <div class="magnifier">
                                    <a href="{{route('mahasiswa-kkn.detail')}}" title=""><i class="flaticon-add"></i></a>
                                </div>
                            </div>
                            <!-- end image-wrap -->
                            <div class="course-details shop-box text-center">
                                <h4>
                                    Nama Mahasiswa
                                    <small>Jurusan</small>
                                    <small>NIM</small>
                                    <small>Wilayah/Kota</small>
                                </h4>
                            </div>
                            <!-- end details -->
                            <div class="course-footer clearfix">
                                <div class="pull-left">
                                    <ul class="list-inline">
                                        <li><a href="{{route('mahasiswa-kkn.detail')}}" class="readmore"> Lihat Detail</a></li>
                                    </ul>
                                </div><!-- end left -->
                            </div><!-- end footer -->
                        </div><!-- end box -->
                    </div><!-- end col -->
                    <div class="col-md-4">
                        <div class="course-box shop-wrapper">
                            <div class="image-wrap entry">
                                <img src="{{asset('images/logo-uns.png')}}" alt="" class="img-responsive">
                                <div class="magnifier">
                                    <a href="{{route('mahasiswa-kkn.detail')}}" title=""><i class="flaticon-add"></i></a>
                                </div>
                            </div>
                            <!-- end image-wrap -->
                            <div class="course-details shop-box text-center">
                                <h4>
                                    Nama Mahasiswa
                                    <small>Jurusan</small>
                                    <small>NIM</small>
                                    <small>Wilayah/Kota</small>
                                </h4>
                            </div>
                            <!-- end details -->
                            <div class="course-footer clearfix">
                                <div class="pull-left">
                                    <ul class="list-inline">
                                        <li><a href="{{route('mahasiswa-kkn.detail')}}" class="readmore"> Lihat Detail</a></li>
                                    </ul>
                                </div><!-- end left -->
                            </div><!-- end footer -->
                        </div><!-- end box -->
                    </div><!-- end col -->
                    <div class="col-md-4">
                        <div class="course-box shop-wrapper">
                            <div class="image-wrap entry">
                                <img src="{{asset('images/logo-uns.png')}}" alt="" class="img-responsive">
                                <div class="magnifier">
                                    <a href="{{route('mahasiswa-kkn.detail')}}" title=""><i class="flaticon-add"></i></a>
                                </div>
                            </div>
                            <!-- end image-wrap -->
                            <div class="course-details shop-box text-center">
                                <h4>
                                    Nama Mahasiswa
                                    <small>Jurusan</small>
                                    <small>NIM</small>
                                    <small>Wilayah/Kota</small>
                                </h4>
                            </div>
                            <!-- end details -->
                            <div class="course-footer clearfix">
                                <div class="pull-left">
                                    <ul class="list-inline">
                                        <li><a href="{{route('mahasiswa-kkn.detail')}}" class="readmore"> Lihat Detail</a></li>
                                    </ul>
                                </div><!-- end left -->
                            </div><!-- end footer -->
                        </div><!-- end box -->
                    </div><!-- end col -->
                    <div class="col-md-4">
                        <div class="course-box shop-wrapper">
                            <div class="image-wrap entry">
                                <img src="{{asset('images/logo-uns.png')}}" alt="" class="img-responsive">
                                <div class="magnifier">
                                    <a href="{{route('mahasiswa-kkn.detail')}}" title=""><i class="flaticon-add"></i></a>
                                </div>
                            </div>
                            <!-- end image-wrap -->
                            <div class="course-details shop-box text-center">
                                <h4>
                                    Nama Mahasiswa
                                    <small>Jurusan</small>
                                    <small>NIM</small>
                                    <small>Wilayah/Kota</small>
                                </h4>
                            </div>
                            <!-- end details -->
                            <div class="course-footer clearfix">
                                <div class="pull-left">
                                    <ul class="list-inline">
                                        <li><a href="{{route('mahasiswa-kkn.detail')}}" class="readmore"> Lihat Detail</a></li>
                                    </ul>
                                </div><!-- end left -->
                            </div><!-- end footer -->
                        </div><!-- end box -->
                    </div><!-- end col -->
                    <div class="col-md-4">
                        <div class="course-box shop-wrapper">
                            <div class="image-wrap entry">
                                <img src="{{asset('images/logo-uns.png')}}" alt="" class="img-responsive">
                                <div class="magnifier">
                                    <a href="{{route('mahasiswa-kkn.detail')}}" title=""><i class="flaticon-add"></i></a>
                                </div>
                            </div>
                            <!-- end image-wrap -->
                            <div class="course-details shop-box text-center">
                                <h4>
                                    Nama Mahasiswa
                                    <small>Jurusan</small>
                                    <small>NIM</small>
                                    <small>Wilayah/Kota</small>
                                </h4>
                            </div>
                            <!-- end details -->
                            <div class="course-footer clearfix">
                                <div class="pull-left">
                                    <ul class="list-inline">
                                        <li><a href="{{route('mahasiswa-kkn.detail')}}" class="readmore"> Lihat Detail</a></li>
                                    </ul>
                                </div><!-- end left -->
                            </div><!-- end footer -->
                        </div><!-- end box -->
                    </div><!-- end col -->
                    <div class="col-md-4">
                        <div class="course-box shop-wrapper">
                            <div class="image-wrap entry">
                                <img src="{{asset('images/logo-uns.png')}}" alt="" class="img-responsive">
                                <div class="magnifier">
                                    <a href="{{route('mahasiswa-kkn.detail')}}" title=""><i class="flaticon-add"></i></a>
                                </div>
                            </div>
                            <!-- end image-wrap -->
                            <div class="course-details shop-box text-center">
                                <h4>
                                    Nama Mahasiswa
                                    <small>Jurusan</small>
                                    <small>NIM</small>
                                    <small>Wilayah/Kota</small>
                                </h4>
                            </div>
                            <!-- end details -->
                            <div class="course-footer clearfix">
                                <div class="pull-left">
                                    <ul class="list-inline">
                                        <li><a href="{{route('mahasiswa-kkn.detail')}}" class="readmore"> Lihat Detail</a></li>
                                    </ul>
                                </div><!-- end left -->
                            </div><!-- end footer -->
                        </div><!-- end box -->
                    </div><!-- end col -->
                </div>
                </div>
            </div>

            <hr class="invis">
            
                <div class="col-md-12">
                    <div class="row text-center">
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