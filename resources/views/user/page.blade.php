@extends('layout.user')

@section('css')

@endsection

@section('content')
<section class="section db p120">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end section -->
<section class="section gb nopadtop">
    <div class="container">
        <div class="boxed">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="content blog-list">
                        <div class="blog-wrapper clearfix">
                            <div class="blog-meta">
                                <h3>{{$menu->page->title}}</h3>
                            </div><!-- end blog-meta -->
                            <p>{{$menu->page->content}}</p>

                            <p>Berikut ini adalah posts yang termasuk dalam category {{$menu->page->title}}</p>

                            @foreach ($posts as $post)

                            <a href="{{route('detail-post', $post->slug)}}">
                                <div class="" style="width: 100%; border:1px solid rgb(24, 120, 165); padding:20px">
                                    <h5>{{$post->title}}</h5>
                                    <hr>
                                    <b>{{$post->overview}}</b>
                                    <p>{{$post->content}}</p>
                                </div>
                            </a>
                            @endforeach

                        </div><!-- end blog -->
                    </div><!-- end content -->

                   
                </div><!-- end col -->

            </div><!-- end row -->
        </div><!-- end boxed -->
    </div><!-- end container -->
</section>
@endsection

@section('js')

@endsection