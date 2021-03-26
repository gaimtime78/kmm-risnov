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

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-5 hidden-sm hidden-xs">
                <div class="custom-module">
                    <img src="{{asset('design/upload/device_01.png')}}" alt="" class="img-responsive wow slideInLeft">
                </div><!-- end module -->
            </div><!-- end col -->
            <div class="col-md-6">
                <div class="custom-module p40l">
                    <h2><mark>SAMBUTAN WR</mark></h2>
                    <p style="text-align:justify">Selamat datang di situs Universitas Sebelas Maret (UNS). Kami merasa terhormat atas kunjungan Anda, semoga Anda tertarik untuk terus dapat memanfaatkan situs ini dalam mencari dan memperoleh informasi dari kami.

UNS merupakan universitas muda dengan potensi yang luar biasa. Selain terletak di kota Solo yang strategis, UNS mempunyai kawasan kampus yang indah, fakultas-fakultas yang berkompetensi tinggi, kegiatan penelitian dan pengabdian masyarakat yang semakin dirasakan manfaatnya oleh stakeholder-nya, perpustakaan yang lengkap dan modern, prasarana dan laboratorium yang canggih di kawasan Jawa Tengah, perkembangan teknologi informasi yang cukup mencengangkan, alumni dengan posisi pekerjaan yang baik di seluruh pelosok negeri serta sumber daya manusia yang sudah diakui baik di tingkat regional ataupun nasional dengan prestasi yang mengesankan di bidangnya masing-masing.

Potensi-potensi tersebut tidak ada artinya jika tidak dilandasi dengan visi, misi dan tujuan akademik yang kuat. Untuk itu,  kami berusaha sekuat tenaga untuk selalu berkomitmen dalam mewujudkan UNS sebagai salah satu pusat pemikiran, pengkajian, dan pengembangan ilmu pengetahuan, seni, teknologi, dan kebudayaan Indonesia dalam rangka memperkaya khasanah kehidupan masyarakat dan mendukung pembangunan nasional.

Selain itu, kami memberikan kesempatan seluas-luasnya kepada segenap elemen civitas academika untuk terus berkompetisi di bidangnya masing-masing, misalnya kami mendorong mahasiswa untuk selalu aktif, kritis dan kreatif dalam setiap kegiatan baik kokurikuler maupun ekstrakurikuler, memacu para dosen dan peneliti untuk selalu dapat menciptakan penemuan-penemuan baru dan mengembangkan inovasi-inovasi yang berguna bagi masyarakat, serta memberikan dukungan bagi unit-unit kerja di lingkungan UNS untuk selalu dapat meningkatkan mutu layanan.

Ke depan, kami berharap dapat memposisikan universitas ini sebagai learning and research university. Ini merupakan kesempatan bagi kami dalam abad ini, dan menghadapi tantangan globalisasi. Terima kasih atas waktunya untuk bereksplorasi di UNS lewat situs ini. Kritik dan saran kami harapkan untuk kemajuan ilmu pengetahuan dan universitas kami.

</p>
                    <hr class="invis">
                    <!-- <div class="btn-wrapper">
                        <a href="#" class="btn btn-primary">Selengkapnya</a>
                    </div> -->
                </div><!-- end module -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>

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
</section>

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
</section><!-- end section -->

<section class="section gb nopadtop">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div style="background-color:aqua" class="box m30">
                    <i class="flaticon-computer-tool-for-education"></i>
                    <h4>BIDANG 1</h4>
                    <!-- <p>All sections required for online training are included to Edulogy.</p> -->
                    <a href="#" class="readmore">Read more</a>
                </div>
            </div><!-- end col -->

            <div class="col-md-4">
                <div style="background-color:brown" class="box m30">
                    <i class="flaticon-monitor-tablet-and-smartohone"></i>
                    <h4>BIDANG 2</h4>
                    <!-- <p>The most important feature of this template is that it is compatible with all mobile devices. Your customers can also visit your site easily from tablets and phones.</p> -->
                    <a href="#" class="readmore">Read more</a>
                </div>
            </div><!-- end col -->

            <div class="col-md-4">
                <div style="background-color:aquamarine" class="box m30">
                    <i class="flaticon-download-business-statistics-symbol-of-a-graphic"></i>
                    <h4>BIDANG 3</h4>
                    <!-- <p>We designed the design of all the sub-pages needed for the users.</p> -->
                    <a href="#" class="readmore">Read more</a>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->

        <hr class="invis">
    </div><!-- end container -->
</section>

<section class="section db">
    <!-- <div class="container">
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
    </div> -->
</section>

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