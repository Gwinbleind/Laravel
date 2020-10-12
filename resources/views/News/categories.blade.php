@extends('layouts.main')

@section('title')
    Категории
@endsection

@section('menu')
    @include ("menu")
@endsection

@section('content')
    <h3>Категории</h3>
    @foreach ($categories as $category)
        <a href="{{route('news.byCategory',$category['slug'])}}">
            {{$category['name']}}
        </a>
        <br>
    @endforeach
@endsection
