@extends('layouts.main')

@section('title')
    Новости по категориям
@endsection

@section('menu')
    @include ("menu")
@endsection

@section('content')
    <h1 class="mt-5">Новости в категории "{{$category['name']}}"</h1>
    @include ('News.newsBlock')
@endsection
