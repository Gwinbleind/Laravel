@extends('layouts.main')

@section('title')
    Новости
@endsection

@section('menu')
    @include ("menu")
@endsection

@section('content')
    <p>Горячие новости</p>
    @include('News.newsBlock')
@endsection
