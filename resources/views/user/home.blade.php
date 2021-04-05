@extends('layout.user')

@section('css')
<style>
    .clamp{
        display:block;
        width:200px;
        text-overflow:ellipsis;
        overflow:hidden;
        max-height:120px;

        display: -webkit-box;
        -webkit-line-clamp: 5;
        -webkit-box-orient: vertical;
    }
    .hr-primary{
        background-image: -webkit-linear-gradient(left, rgba(66,133,244,.8), rgba(66, 133, 244,.6), rgba(0,0,0,0));
    }
    .hr-primary2{
        background-image: -webkit-linear-gradient(right, rgba(66,133,244,.8), rgba(66, 133, 244,.6), rgba(0,0,0,0));
    }

    .hr {
    height: 4px;
    margin-left: 15px;
    margin-bottom:-3px;
    }
</style>
@endsection

@section('content')
<section id="home" class="video-section js-height-full">
    <div style="color:grey" class="overlay"></div>
    <div class="home-text-wrapper relative container">
        <div class="home-message">
            <p>Riset Inovasi</p>
            <small>Universitas Sebelas Maret</small>
        </div>
    </div>
</section>
<section class="section gb nopadtop">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="box m30">
                    <i class="flaticon-computer-tool-for-education"></i>
                    <h4>KHDTK</h4></br>
                    <a href="https://diklathut.uns.ac.id/" class="readmore">Pelajari Selengkapnya</a>
                </div>
            </div><!-- end col -->

            <div class="col-md-6">
                <div class="box m30">
                    <i class="flaticon-monitor-tablet-and-smartohone"></i>
                    <h4>Lembaga Penelitian dan Pengabdian Kepada Masyarakat</h4>
                    <a href="http://lppm.uns.ac.id/" class="readmore">Pelajari Selengkapnya</a>
                </div>
            </div><!-- end col -->

            <div class="col-md-3">
                <div class="box m30">
                    <i class="flaticon-download-business-statistics-symbol-of-a-graphic"></i>
                    <h4>Direktorat Inovasi dan Hilirisasi</h4>
                    <a href="{{route('coming')}}" class="readmore">Pelajari Selengkapnya</a>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->

        <hr class="invis">
        
    </div><!-- end container -->
</section>
<section class="section gb nopadtop">
    <div class="container">
        <div class="boxed">
            <div class="row">
                <div class="section-title text-center">
                    </div><!-- end title -->
                    <div class="sidebar col-md-4">
                        <div class="widget clearfix">
                            <div class="banner-widget">
                                <!-- <img src="upload/banner.jpeg" alt="" class="img-responsive img-rounded"> -->
                                <h3>BERITA TERKINI</h3>
                            </div>
                        </div>
                    <div class="widget clearfix">
                        <h3 class="widget-title">Popular Post</h3>
                        @foreach($left as $q)
                        <div class="post-widget">
                            <div class="media">
                                <img style="width:50px;object-fit:cover;" src="{{asset('upload/post/'.$q->thumbnail)}}" alt="" class="img-responsive alignleft img-rounded">
                                <div class="media-body">
                                   
                                    <a href="{{route('detail-post',['slug'=>str_replace(' ', '-', $q->title)])}}" title="">{{$q->title}}</a>
                                    <div class="blog-meta">
                                        <ul class="list-inline">
                                            <li> <small><i class="fa fa-clock-o"></i> {{date("d M Y", strtotime($q->published_at)) }}</small></li>
                                        </ul>
                                    </div><!-- end blog-meta -->
                                </div>
                            </div>
                        </div><!-- end post-widget -->
                        @endforeach
                    </div><!-- end widget -->
                </div><!-- end sidebar -->
                @foreach($post as $p)
                <div class="col-md-8">
                    <div class="content blog-list">
                        <div class="blog-wrapper clearfix">
                            <div class="blog-meta">
                                <!-- <small><a href="#">Berita Terkini</a></small> -->
                                <h3><a href="{{route('detail-post',['slug'=>str_replace(' ', '-', $p->title)])}}" title="">{{$p->title}}</a></h3>
                                <ul class="list-inline">
                                    <li>{{date("d M Y", strtotime($p->published_at)) }}</li>
                                </ul>
                            </div><!-- end blog-meta -->

                            <div class="blog-media">
                                <img src="{{asset('upload/post/'.$p->thumbnail)}}" alt="" class="img-responsive img-rounded">
                            </div><!-- end media -->

                            <div class="blog-desc-big">
                                <p >{{$p->overview}}</p>
                                <a href="{{route('detail-post',['slug'=>str_replace(' ', '-', $p->title)])}}" class="btn btn-primary">Read More</a>
                            </div><!-- end desc -->
                        </div><!-- end blog -->
                    </div><!-- end content -->
                    <div class="section-button text-center">
                        <a href="{{route('berita-terkini')}}" class="btn btn-primary">Lihat Berita Lainnya</a>
                    </div>
                </div><!-- end col -->
                @endforeach
            </div><!-- end row -->
        </div><!-- end boxed -->
    </div><!-- end container -->
</section>
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 hidden-sm hidden-xs">
                <div class="custom-module">
                    <h2><mark>Produk Siap Komersial</mark></h2>
                </div>
                <hr class="hr-primary">
            </div>
            <div class="col-md-6 hidden-sm hidden-xs">
                <div class="custom-module">
                    <br>
                    <img style="height:500px;object-fit:cover;" src="{{asset('images/produk-siap.PNG')}}" alt="download-ebook" class="img-responsive wow slideInLeft">
                    <a href="https://cloud.uns.ac.id/index.php/s/mq67vUFZMJWDT6T" target="_blank"><p style="text-align:center">Download E-book</p></a>
                </div><!-- end module -->
            </div><!-- end col -->
            <div class="col-md-6">
                <div class="custom-module p40l">
                    <p style="text-align:justify; 
                        margin: 18rem 0px 0px 0px;
                        width: 100%;
                        padding: 10px;">Bidang Riset dan Inovasi UNS (RISNOV UNS)
                        menyampaikan terima kasih yang sebesar-besarnya atas kegigihan kepada para
                        inventor yang telah menghilirkan hasil risetnya dan para inovator yang telah menghasilkan produk inovasinya. RISNOV mendorong
                        para peneliti dan inovator UNS untuk
                        melakukan riset dan inovasi secara berkelanjutan hingga produknya dimanfaatkan
                        masyarakat. Mari bersama-sama majukan
                        Riset dan Inovasi UNS untuk masyarakat.
                    </p>
                    <div class="authorbox">
                        <div class="site-publisher clearfix">
                            <!-- <img src="upload/people_10.jpeg" alt="" class="img-responsive img-circle"> -->
                            <a href="#" title="" style="text-align: right;" >
                                <h4><span>Prof. Dr. Kuncoro Diharjo, S.T., M.T.</span></h4>
                            </a>
                            <p style="text-align: right;">Wakil Rektor Riset dan Inovasi</p>
                            <!-- end share -->
                        </div><!-- end publisher -->
                    </div><!-- end details -->
                    <hr class="invis">
                    <!-- <div class="btn-wrapper">
                        <a href="#" class="btn btn-primary">Selengkapnya</a>
                    </div> -->
                </div><!-- end module -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>


<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="custom-module p40l">
                    <a href="{{route('produk-komersial')}}">
                        <h3><mark>Publikasi Produk Siap Komersial</mark></h3>
                    </a>
                    <hr class="hr-primary2">
                </div>
            </div>
            <div class="col-md-6">
                <div class="custom-module p40l">
                    <p style="text-align:justify; 
                        margin: 3rem 0px 0px 0px;
                        width: 100%;
                        padding: 10px;">Universitas Sebelas Maret (UNS) memberikan
                        apresiasi yang tinggi kepada Bidang Riset dan
                        Inovasi yang telah melangkah sebagai inisiator hilirisasi Produk Siap Komersial. Langkah ini merupakan salah satu capaian Indek
                        Kinerja Utama (IKU) UNS, khususnya dalam
                        menghadirkan produk yang dimanfaatkan
                        oleh masyarakat. Produk-produk ini dapat
                        segera dipasarkan oleh unit bisnis UNS agar
                        secepatnya memberikan revenue generating untuk meningkatkan pendapatan non
                        akademik. Peluncuran Produk Siap Komersial pada puncak DIES NATALIS UNS ke-45
                        tahun 2021 ini, sangat relevan dengan semangat otonomi kampus PTN-BH UNS.
                    </p>
                    <hr class="invis">

                </div><!-- end module -->
                
            </div><!-- end col -->
            <div class="col-md-6 hidden-sm hidden-xs">
                <div class="custom-module">
                </div>
                <div class="custom-module">
                    <img style="height:500px;object-fit:cover;margin-top: 1rem;" src="{{asset('images/penelitian.jpg')}}" alt="download-ebook" class="img-responsive wow slideInLeft">
                </div><!-- end module -->
            </div><!-- end col -->
            <div class="col-md-12 text-center">
                <div class="btn-wrapper">
                    <a href="{{route('produk-komersial')}}" class="readmore btn btn-primary">Selengkapnya</a>
                </div>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</section>
{{--
<section class="section gb">
    <div class="container">
        <div class="section-title text-center">
            <h3>BERITA</h3>
        </div><!-- end title -->
        <!-- <div class="row">
            <div class="col-md-12 text-right">
                <ul class="pagination ">
                    <li class="active"><a href="javascript:void(0)">&laquo;</a></li>
                    <li class="active"><a href="javascript:void(0)">&raquo;</a></li>
                </ul>
            </div>
        </div> -->
        <div id="owl-01" class="owl-carousel owl-theme owl-theme-01">
            @foreach($post as $p)
            <div class="caro-item">
                <div class="course-box">
                    <div class="image-wrap entry">
                        <img style="height:200px;object-fit:cover;" src="{{asset('upload/post/'.$p->thumbnail)}}" alt="" class="img-responsive">
                        <div class="magnifier">
                            <a href="{{route('detail-post',['slug'=>str_replace(' ', '-', $p->title)])}}" title=""><p>Selengkapnya</p></a>
                        </div>
                    </div><!-- end image-wrap -->
                    <div  class="course-details">
                        <div style="">
                            <h4>
                                <small><i class="fa fa-clock-o"></i> {{date("d M Y", strtotime($p->published_at)) }}</small>
                                <a href="{{route('detail-post',['slug'=>str_replace(' ', '-', $p->title)])}}" title="">{{$p->title}}</a>
                            </h4>
                        </div>
                        
                        <div style="height:120px;">
                            <div class="clamp">{{$p->overview}}</div>
                        </div><br>
                        <a href="{{route('detail-post',['slug'=>str_replace(' ', '-', $p->title)])}}" class="readmore">Selengkapnya</a>
                    </div><!-- end details -->
                    
                   
                </div><!-- end box -->
            </div><!-- end col -->
            @endforeach

        </div><!-- end row -->

        <hr class="invis">

        <div class="section-button text-center">
            <a href="{{route('berita-terkini')}}" class="btn btn-primary">Lihat Berita Lainnya</a>
        </div>
    </div><!-- end container -->
</section> --}}
{{--
<section class="section db p120">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tagline-message text-center">
                    <!-- <h3>Howdy, we are Edulogy, we have brought together the best quality services, offers, projects for you!</h3> -->
                </div>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end section -->--}}
<!-- 
<section class="section db">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="stat-count">
                    <h4 class="stat-timer">1230</h4>
                    <h3><i class="flaticon-black-graduation-cap-tool-of-university-student-for-head"></i> Happy Students</h3>
                    <p>Quisque porttitor eros quis leo pulvinar, at hendrerit sapien iaculis. </p>
                </div>
            </div>

            <div class="col-lg-4 col-md-4">
                <div class="stat-count">
                    <h4 class="stat-timer">331</h4>
                    <h3><i class="flaticon-online-course"></i> Course Done</h3>
                    <p>Quisque porttitor eros quis leo pulvinar, at hendrerit sapien iaculis. </p>
                </div>
            </div>

            <div class="col-lg-4 col-md-4">
                <div class="stat-count">
                    <h4 class="stat-timer">8901</h4>
                    <h3><i class="flaticon-coffee-cup"></i> Ordered Coffe's</h3>
                    <p>Quisque porttitor eros quis leo pulvinar, at hendrerit sapien iaculis. </p>
                </div>
            </div>
        </div>
    </div>
</section> -->

<section class="section gb">
    <div class="container">
        <div class="section-title text-center">
            <h3>Gallery</h3>
        </div><!-- end title -->
        <div class="row">
            <div class="col-md-12 text-right">
                <ul class="pagination ">
                    <li class="active"><a href="javascript:void(0)">&laquo;</a></li>
                    <li class="active"><a href="javascript:void(0)">&raquo;</a></li>
                </ul>
            </div><!-- end col -->
        </div><!-- end row -->

        <div class="boxed boxedp4">
            <div class="row blog-grid">
                <div class="col-md-4">
                    <div class="course-box">
                        <div class="image-wrap entry">
                            <img src="images/gallary/6.jpg" alt="" class="img-responsive">
                            <div class="magnifier">
                                <a href="blog-single.html" title=""><i class="flaticon-add"></i></a>
                            </div>
                        </div><!-- end image-wrap -->
                    </div><!-- end box -->
                </div><!-- end col -->
                <div class="col-md-4">
                    <div class="course-box">
                        <div class="image-wrap entry">
                            <img src="images/gallary/6.jpg" alt="" class="img-responsive">
                            <div class="magnifier">
                                <a href="blog-single.html" title=""><i class="flaticon-add"></i></a>
                            </div>
                        </div><!-- end image-wrap -->
                    </div><!-- end box -->
                </div><!-- end col -->
                <div class="col-md-4">
                    <div class="course-box">
                        <div class="image-wrap entry">
                            <img src="images/gallary/8.jpg" alt="" class="img-responsive">
                            <div class="magnifier">
                                <a href="blog-single.html" title=""><i class="flaticon-add"></i></a>
                            </div>
                        </div><!-- end image-wrap -->
                    </div><!-- end box -->
                </div><!-- end col -->
                <div class="col-md-4">
                    <div class="course-box">
                        <div class="image-wrap entry">
                            <img src="images/gallary/4.jpg" alt="" class="img-responsive">
                            <div class="magnifier">
                                <a href="blog-single.html" title=""><i class="flaticon-add"></i></a>
                            </div>
                        </div><!-- end image-wrap -->
                    </div><!-- end box -->
                </div><!-- end col -->
                <div class="col-md-4">
                    <div class="course-box">
                        <div class="image-wrap entry">
                            <img src="images/gallary/5.jpg" alt="" class="img-responsive">
                            <div class="magnifier">
                                <a href="blog-single.html" title=""><i class="flaticon-add"></i></a>
                            </div>
                        </div><!-- end image-wrap -->
                    </div><!-- end box -->
                </div><!-- end col -->
                <div class="col-md-4">
                    <div class="course-box">
                        <div class="image-wrap entry">
                            <img src="images/gallary/7.jpg" alt="" class="img-responsive">
                            <div class="magnifier">
                                <a href="blog-single.html" title=""><i class="flaticon-add"></i></a>
                            </div>
                        </div><!-- end image-wrap -->
                    </div><!-- end box -->
                </div><!-- end col -->
            </div><!-- end row -->

            <hr class="invis">
            <div class="section-button text-center">
                <a href="#" class="btn btn-primary">Lihat Gallery</a>
            </div>

        </div><!-- end boxed -->
    </div><!-- end container -->
</section>

@endsection

@section('js')

@endsection