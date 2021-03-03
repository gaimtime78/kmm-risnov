@extends('layout.user')

@section('css')
<style>
    .clamp{
        display:block;
        width:300px;
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
        <section class="section db p120">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tagline-message page-title text-center">
                            <h3>Berita Terkini</h3>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end section -->
        
        <section class="section gb nopadtop">
            <div class="container">
                <div class="boxed boxedp4">
                    <div class="row blog-grid">
                        <!-- CARD -->
                        @foreach($post as $p)
                        <div class="col-md-4">
                            <div class="course-box">
                                <div class="image-wrap entry">
                                    <img style="height:200px;object-fit:cover;" src="{{asset('upload/post/'.$p->thumbnail)}}" alt="" class="img-responsive">
                                    <div class="magnifier">
                                        <a href="#" title=""><p>See More</p></a>
                                    </div>
                                </div><!-- end image-wrap -->
                                <div  class="course-details">
                                    <div style="display:grid;grid-template-columns:1fr 1fr;grid-gap:1em;">
                                        <h4>
                                            <small>Bertia Terkini</small>
                                            <a href="#" title="">{{$p->title}}</a>
                                        </h4>
                                    </div>
                                    <div style="height:120px;">
                                        <div class="clamp">{{$p->overview}}</div>
                                    </div>
                                    
                                </div><!-- end details -->
                                <div class="course-footer clearfix">
                                    <div class="pull-left">
                                        <ul class="list-inline">
                                            <li><a href="#"><i class="fa fa-user"></i> {{$p->user->name}}</a></li>
                                            <li><a href="#"><i class="fa fa-clock-o"></i> {{date("d M Y", strtotime($p->created_at)) }}</a></li>
                                        </ul>
                                    </div><!-- end left -->
                                </div><!-- end footer -->
                            </div><!-- end box -->
                        </div><!-- end col -->
                        @endforeach
                        
                    </div><!-- end row -->

                    <hr class="invis">

                    <div class="row">
                        <div class="col-md-12 text-center">
                            {{$post->links()}}
                        </div><!-- end col -->
                    </div><!-- end row -->
                    
                    <div class="row" style="margin-bottom:5px">
                        <div class="col-md-12 ">
                            <h2><strong>POSTINGAN TERBARU</strong></h2>
                        </div><!-- end col -->
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            @foreach($latest as $l)
                            <div class="content blog-list">
                                <div class="blog-wrapper clearfix">
                                    <div class="blog-meta">
                                        <div class="tags-widget">
                                            <ul class="list-inline">
                                                @foreach($l->category()->pluck('category')->toArray() as $cc)
                                                    <li><a href="#">{{$cc}}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <h3><a href="#" title="">{{$l->title}}</a></h3>
                                        <ul class="list-inline">
                                            <li>{{$l->created_at}}</li>
                                            <li><span>ditulis oleh</span> <a href="#">{{$l->user->name}}</a></li>
                                        </ul>
                                    </div><!-- end blog-meta -->

                                    <div class="blog-media">
                                        <a href="#" title=""><img src="{{asset('upload/post/'.$p->thumbnail)}}" alt="" class="img-responsive img-rounded"></a>
                                    </div><!-- end media -->

                                    <div class="blog-desc-big">
                                        <!-- <p class="lead">You can get all the icon versions by checking out our standard license that come with every free icons..</p> -->
                                        <!-- <p>Integer eu urna sit amet dolor fringilla vulputate. Sed diam nunc, pellentesque sed lobortis non, tincidunt et sem. Sed sollicitudin elementum mi eget lobortis. Aliquam molestie rhoncus nisl, vitae molestie leo imperdiet ac. Aliquam diam est, aliquam vitae tristique nec, pretium a libero. Vivamus tempor sed turpis sit amet malesuada.</p> -->
                                        <p>{{$p->overview}}</p>
                                        <a href="#" class="btn btn-primary">Selengkapnya</a>
                                    </div><!-- end desc -->
                                </div><!-- end blog -->
                            </div><!-- end content -->
                            @endforeach
                            <div class="row">
                                <div class="col-md-12">
                                    {{$latest->links()}}
                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div><!-- end col -->

                        <div class="sidebar col-md-4">
                            <!-- <div class="widget clearfix">
                                <div class="banner-widget">
                                    <img src="upload/banner.jpeg" alt="" class="img-responsive img-rounded">
                                </div>
                            </div> -->

                            <div class="widget clearfix">
                                <h3 class="widget-title">Kategori</h3>
                                <div class="tags-widget">
                                    <ul class="list-inline">
                                        @foreach($category as $c)
                                        <li><a href="#">{{$c->category}}</a></li>
                                        @endforeach
                                    </ul>
                                </div><!-- end list-widget -->
                            </div><!-- end widget -->
                        </div><!-- end sidebar -->
                    </div><!-- end row -->
                </div><!-- end boxed -->
              
            </div><!-- end container -->
        </section>

        
   
@endsection

@section('js')

@endsection