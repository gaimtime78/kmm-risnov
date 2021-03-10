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
    .title-clamp{
        display:block;
        width:100%;
        text-overflow:ellipsis;
        overflow:hidden;
        max-height:120px;

        display: -webkit-box;
        -webkit-line-clamp: 2;
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
                            <h3>Produk Komersil</h3>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end section -->
        
        <section class="section gb nopadtop">
            <div class="container">
                <div class="boxed boxedp4">
                    <div class="row blog-grid">
                        <div style="margin-bottom:3em;" class="col-md-12">
                            <div class="tagline-message page-title text-center">
                                <!-- <h3>PRODUK KOMERSIL</h3> -->
                            </div>
                        </div><!-- end col -->
                        <!-- CARD -->
                        @foreach($produk as $p)
                        <div class="col-md-4">
                            <div class="course-box">
                                <div class="image-wrap entry">
                                    <img style="height:200px;object-fit:cover;" src="{{asset('upload/post/'.$p->thumbnail)}}" alt="" class="img-responsive">
                                    <div class="magnifier">
                                        <a href="{{route('detail-post',['slug'=>str_replace(' ', '-', $p->title)])}}" title=""><p>Selengkapnya</p></a>
                                    </div>
                                </div><!-- end image-wrap -->
                                <div  class="course-details">
                                    <div style="display:grid;grid-template-columns:1fr 1fr;grid-gap:1em;">
                                        <h4>
                                            <small>Produk Komersil</small>
                                        </h4>
                                    </div>
                                    <div style="height:50px;">
                                        <a class="title-clamp" href="{{route('detail-post',['slug'=>str_replace(' ', '-', $p->title)])}}" title="">{{$p->title}}</a>
                                    </div>
                                    <div style="height:120px;">
                                        <div class="clamp">{{$p->overview}}</div>
                                    </div>
                                    
                                </div><!-- end details -->
                                <div class="course-footer clearfix">
                                    <div class="pull-left">
                                        <ul class="list-inline">
                                            <li><a href="#"><i class="fa fa-user"></i> {{$p->user->name}}</a></li>
                                            <li><a href="#"><i class="fa fa-clock-o"></i> {{date("d M Y", strtotime($p->published_at)) }}</a></li>
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
                            {{$produk->links()}}
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end boxed -->
            </div><!-- end container -->
        </section>
@endsection

@section('js')

@endsection