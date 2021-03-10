@extends('layout.blog')

@section('title', $page->title)

@section('created_at', $page->created_at->diffForHumans())

@section('content')
    <div class="section">
        {!! $page->content !!}
    </div>

    <div class="section">
        <div class="row">
            @foreach ($latestPost as $post)
                <div class="col s4">
                    <div class="card">
                        <div class="card-image">
                            <img src="{{ asset('produk\\') . $post->thumbnail }}">
                            <span class="card-title"
                                style="font-size: inherit;font-weight: 700;text-align: left;">{{ $post->title }}</span>
                        </div>
                        <div class="card-content">
                            <p>I am a very simple card. I am good at containing small bits of information.
                                I am convenient because I require little markup to use effectively.</p>
                        </div>
                        <div class="card-action">
                            <a href="#">This is a link</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
