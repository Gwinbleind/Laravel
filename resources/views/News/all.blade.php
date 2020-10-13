@extends('layouts.main')

@section('title')
    Новости
@endsection

@section('menu')
    @include ("menu")
@endsection

@section('content')
    <h1 class="mt-5">Горячие новости</h1>
    @include('News.newsBlock')
@endsection
