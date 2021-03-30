@extends('layout.user')

@section('css')
<link type="text/css" rel="stylesheet" href="{{asset('404/css/style.css')}}" />
@endsection

@section('content')	
		<section class="section db p120">
            <div class="container" style="text-align:center;">
				<h2 style=" color:#FFF;">Dokumentasi Risnov</h2>
            </div>
        </section>
		{{--<section class="section gb nopadtop">
            <div class="container">
                <div class="boxed boxedp4">
					<div id="notfound">
						<div class="notfound">
							<div class="notfound-404">
								<h3 text-align="center">Kami, <strong>Biro Riset dan Pengabdian Kepada Masyarakat Universitas Sebelas Maret</strong> sedang bekerja keras untuk menyelesaikan pengembangan situs ini </h3>
							</div>
							<a href="{{route('home')}}">Go TO Homepage</a>
						</div>
					</div>
                </div><!-- end boxed -->
              
            </div><!-- end container -->
        </section>--}}

        <section class="section">
            <div class="container">
                <div class=" ">
                    <div class="col-md-3">
                        <div class="course-box shop-wrapper">
                                <div class="course-footer clearfix">
                                </div><!-- end footer -->
                            </div><!-- end box -->
                        </div><!-- end col -->

                        <div class="col-md-3">
                            <div class="course-box shop-wrapper">
                                <div class="image-wrap entry">
                                    <img style="height:200px;object-fit:cover;" src="{{asset('images/collection-onlinenews.jpeg')}}" alt="" class="img-responsive">
                                    <div class="magnifier">
                                        <a href="{{route('coming')}}" title="">Selengkapnya</a>
                                    </div>
                                </div>
                                <!-- end image-wrap -->
                                <div class="course-details shop-box text-center">
                                    <p>
                                        <a href="{{route('koran-search')}}" title="">Dokumentasi Koran Digital</a>
                                    </p>
                                </div>
                                <!-- end details -->
                                <div class="course-footer clearfix">
                                </div><!-- end footer -->
                            </div><!-- end box -->
                        </div><!-- end col -->

                        <div class="col-md-3">
                        <div class="course-box shop-wrapper">
                                <div class="image-wrap entry">
                                    <img style="height:200px;object-fit:cover;" src="{{asset('images/produk-siap.PNG')}}" alt="" class="img-responsive">
                                    <div class="magnifier">
                                        <a href="{{route('coming')}}" title="">Selengkapnya</a>
                                    </div>
                                </div>
                                <!-- end image-wrap -->
                                <div class="course-details shop-box text-center">
                                    <p>
                                        <a href="{{route('coming')}}" title="">Download E-Book</a>
                                    </p>
                                </div>
                                <!-- end details -->
                                <div class="course-footer clearfix">
                                </div><!-- end footer -->
                            </div><!-- end box -->
                        </div><!-- end col -->

                        <div class="col-md-3">
                            <div class="course-box shop-wrapper">
                            </div><!-- end box -->
                        </div><!-- end col -->

                            
                        </div><!-- end row -->

                    <hr class="invis">
                </div>
            </div>
        </section>


                    <hr class="invis">

@endsection

@section('js')

@endsection