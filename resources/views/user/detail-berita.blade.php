@extends('layout.user')

@section('css')

@endsection

@section('content')
        <section class="section db p120">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tagline-message page-title text-center">
                            <!-- <h3>POST</h3> -->
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
                                        <h3>{{$post->title}}</h3>
                                        <div class="tags-widget">
                                            <ul class="list-inline">
                                                @foreach($post->category()->pluck('category')->toArray() as $cc)
                                                    <li><a href="#">{{$cc}}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <ul class="list-inline">
                                            <li><i class="fa fa-clock-o"></i> Dipublikasikan pada : {{date("d M Y", strtotime($post->published_at))}}</li><br>
                                            <li><i class="fa fa-user"></i><span> Penulis : </span> <a href="#">{{$post->user->name}}</a></li>
                                        </ul>
                                    </div><!-- end blog-meta -->

                                    <div class="blog-media">
                                    <img src="{{asset('upload/post/'.$post->thumbnail)}}" alt="" class="img-responsive img-rounded">
                                    </div><!-- end media -->

                                    <div class="blog-desc-big">
                                        <!-- <p class="lead">{{$post->overview}}</p> -->
                                        <p>{!! $post->content !!}</p>
                                        <hr class="invis">

                                        <!-- end list-widget -->

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