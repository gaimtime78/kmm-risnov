@extends('layout.blog')

@section('title', $page->title)

@section('created_at', $page->created_at->diffForHumans())

@section('content')
{!! $page->content !!}
@endsection