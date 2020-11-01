@extends('layouts.main')

@section('title','Новости')

@section('menu')
    @include ("menu")
@endsection

@section('content')
    <h1 class="mt-5">Горячие новости</h1>
    @include('News.Subviews.newsBlock')
    {{ $news->links() }}
@endsection
