@extends('layout.user')

@section('css')

@endsection

@section('content')
        <section class="section db p120">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tagline-message page-title text-center">
                            <h3>Detail Berita</h3>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end section -->

        <section class="section gb nopadtop">
            <div class="container">
                <div class="boxed">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="content blog-list">
                                <div class="blog-wrapper clearfix">
                                    <div class="blog-meta">
                                        <small><a href="#">Kategorinya</a></small>
                                        <h3>Judul Berita</h3>
                                        <ul class="list-inline">
                                            <li>Waktu upload</li>
                                            <li><span>ditulis oleh</span> <a href="#">Siapa</a></li>
                                        </ul>
                                    </div><!-- end blog-meta -->

                                    <div class="blog-media">
                                    <img src="{{asset('design/upload/blog_01.jpg')}}" alt="" class="img-responsive img-rounded">
                                    </div><!-- end media -->

                                    <div class="blog-desc-big">
                                        <p class="lead">Kalimat Pembuka</p>
                                        <p>Integer eu urna sit amet dolor fringilla vulputate. Sed diam nunc, pellentesque sed lobortis non, tincidunt et sem. Sed sollicitudin elementum mi eget lobortis. Aliquam molestie rhoncus nisl, vitae molestie leo imperdiet ac. Aliquam diam est, aliquam vitae tristique nec, pretium a libero. Vivamus tempor sed turpis sit amet malesuada.</p>

                                        <p> Cras eu lacus et nulla dignissim <a href="#">ultrices</a>. Duis ullamcorper finibus quam, sed convallis massa pharetra nec. Duis nec molestie dolor. Nam augue neque, efficitur vel lacus sit amet, consequat pharetra massa. Proin nunc magna, congue vitae justo ut, dignissim dapibus enim. Integer sollicitudin lacus a iaculis molestie. Donec quis consequat erat. Cras vitae consequat sem. Integer eleifend purus congue, gravida sem eu, pharetra sapien. Nunc venenatis, lacus id pretium volutpat, augue eros accumsan leo, eu condimentum velit nulla nec sem. Donec interdum bibendum eros, ut facilisis nunc malesuada id. Nulla quis ex non magna sollicitudin sodales vestibulum nec massa. Nullam ut nibh quis est aliquet viverra mattis eu ligula. Pellentesque dui mi, ultricies ut velit id, iaculis lacinia est. </p>

                                        <blockquote class="text-center">
                                            "Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."
                                        </blockquote>

                                        <p>Integer eu urna <a href="#">sit amet dolor fringilla vulputate</a>. Sed diam nunc, pellentesque sed lobortis non, tincidunt et sem. Sed sollicitudin elementum mi eget lobortis. Aliquam molestie rhoncus nisl, vitae molestie leo imperdiet ac. Aliquam diam est, aliquam vitae tristique nec, pretium a libero. Vivamus tempor sed turpis sit amet malesuada.</p>

                                        <p> Quisque at vestibulum neque. Duis eget sapien ac quam interdum euismod. Mauris blandit tincidunt neque, vitae vestibulum tortor dapibus non. Nunc eu sollicitudin diam. Proin vel erat vitae augue eleifend convallis. Curabitur ut risus id ex finibus rhoncus sit amet a libero. Aenean a turpis eget nisi posuere tempor. Aliquam iaculis sem eros. Fusce nec erat eget sem aliquam congue quis vitae mi. Praesent varius dictum cursus. </p>

                                        <hr class="invis">

                                        <div class="tags-widget">   
                                            <ul class="list-inline">
                                                <li><a href="#">course</a></li>
                                                <li><a href="#">web design</a></li>
                                                <li><a href="#">development</a></li>
                                                <li><a href="#">language</a></li>
                                            </ul>
                                        </div><!-- end list-widget -->

                                    </div><!-- end desc -->
                                </div><!-- end blog -->
                            </div><!-- end content -->

                            <!-- <div class="authorbox">
                                <div class="site-publisher clearfix">
                                    <img src="upload/people_10.jpeg" alt="" class="img-responsive img-circle">
                                    <a href="single-agency.html" title=""><h4><small>about</small> <span>Martin Martines</span></h4></a>
                                    <p>Exercitation photo booth stumptown tote bag Banksy, elit small batch freegan sed. Craft beer elit seitan exercitation, photo booth.</p>

                                    <div class="authorbox-social">
                                        <ul class="list-inline">
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                            <li><a href="#"><i class="fa fa-envelope-o"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div> -->
                            <!-- end details -->

                            

                        </div><!-- end col -->

                        
                    </div><!-- end row -->
                </div><!-- end boxed -->
            </div><!-- end container -->
        </section>        
@endsection

@section('js')

@endsection