@extends('layouts.main')

@section('title','Новости по категориям')

@section('menu')
    @include ("menu")
@endsection

@section('content')
    <h1 class="mt-5">Новости в категории "{{$category->name}}"</h1>
    @include ('News.newsBlock')
    {{ $news->links() }}
@endsection
