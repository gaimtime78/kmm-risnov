@extends('layout.user')

@section('css')
<style>
    .clamp{
        display:block;
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
                            <h3>KORAN DIGITAL</h3>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end section -->
        
        <section class="section gb nopadtop">
            <div class="container">
                <div class="boxed boxedp4">
                    <div class="row blog-grid">
                      
                      <form id="login-form" method="get" action="{{route('koran-search')}}">
                        <div style="display:grid;grid-template-columns:5fr 1fr; grid-gap:1em;margin-bottom:2em;">
                          <div>
                            <input class="form-control input-lg" value="{{$searchVal}}" name="cari" type="text" placeholder="Cari koran berdasarkan judul">
                          </div>
                          <div>  
                            <button class="btn btn-primary" type="submit">Cari</button>
                          </div>
                        </div>
                      </form>

                        <!-- CARD -->                        
                        @foreach($koran as $p)
                        <div class="col-md-4">
                            <div class="course-box">
                                <div  class="course-details">
                                    <h3 style="margin-top:0px;">
                                        <a class="title-clamp" href="{{route('detail-koran',['slug'=>str_replace(' ', '-', $p->title)])}}" title="">{{$p->title}}</a>
                                    </h3>
                                    <div style="text-align: justify;">
                                      <p class="clamp" style="margin-top:1em; margin-bottom:1em;">{{$p->content}}</p>
                                    </div>
                                    <a style="width:100%; padding-top:0.5em; padding-bottom:0.5em; margin-top:1em;" class="btn btn-primary" href="{{route('detail-koran',['slug'=>str_replace(' ', '-', $p->title)])}}">Selengkapnya</a>
                                    
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
                            {{$koran->links()}}
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end boxed -->
            </div><!-- end container -->
        </section>
@endsection

@section('js')

@endsection