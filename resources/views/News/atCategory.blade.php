@extends('layouts.main')

@section('title')
    Новости по категориям
@endsection

@section('menu')
    @include ("menu")
@endsection

@section('content')
    <h2>Новости в категории "{{$category['name']}}"</h2>
    @include ('News.newsBlock')
@endsection
