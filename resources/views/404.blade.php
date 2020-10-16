@extends('layouts.main')

@section('title')
    404
@endsection

@section('menu')
    @include ("menu")
@endsection

@section('content')
    <h2>Error 404: Page not found</h2>
    <a href="{{route('home')}}">На главную</a>
@endsection
