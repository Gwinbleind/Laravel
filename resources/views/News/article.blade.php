@extends('layouts.main')

@section('title')
    Новость
@endsection

@section('menu')
    @include ("menu")
@endsection

@section('content')
    @isset($article)
        Новость № {{$article['id']}}
        <h2>{{$article['title']}}</h2>
        {{$article['body']}}
    @endisset
    @empty($article)
        <h2>Новость не найдена</h2>
        <a href="{{route('news.all')}}">К новостям</a>
    @endempty
@endsection
