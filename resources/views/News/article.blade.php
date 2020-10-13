@extends('layouts.main')

@section('title')
    Новость
@endsection

@section('menu')
    @include ("menu")
@endsection

@section('content')
    @isset($article['id'])
        <p class="lead">Новость № {{$article['id']}}</p>
        <h1 class="mt-5">{{$article['title']}}</h1>
        <p class="lead">
            {{$article['body']}}
        </p>
    @endisset
    @empty($article)
        <h1 class="mt-5">Новость не найдена</h1>
        <a href="{{route('news.all')}}">К новостям</a>
    @endempty
@endsection
