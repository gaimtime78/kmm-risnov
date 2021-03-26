@extends('layout.user')

@section('css')

@endsection

@section('content')
        <section class="section db p120">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tagline-message page-title text-center">
                        <h3>{{$koran->title}}</h3>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end section -->

        <section class="section gb nopadtop">
            <div class="container">
                <div class="boxed">
                    <div class="row">
                        <div class="col-md-12" style="padding-right:2em;padding-left:2em;">
                            <div class="content blog-list">
                                <div class="blog-wrapper clearfix">
                                    <div class="blog-meta">
                                        <!-- <h3>{{$koran->title}}</h3> -->
                                        <div class="tags-widget">
                                            <a href="{{$koran->source}}">{{$koran->source}}</a>
                                        </div>
                                    </div><!-- end blog-meta -->

                                    <div class="blog-desc-big">
                                        <p>{!! $koran->content !!}</p>
                                        <hr class="invis">

                                        <!-- end list-widget -->
                                       
                                        <ul class="list-inline">
                                            <li><i class="fa fa-clock-o"></i> Dipublikasikan pada : {{date("d M Y", strtotime($koran->published_at))}}</li><br>
                                            <li><i class="fa fa-user"></i><span> Penulis : </span> <a href="#">{{$koran->user->name}}</a></li>
                                        </ul>
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