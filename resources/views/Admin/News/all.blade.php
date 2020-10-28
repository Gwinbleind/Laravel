@extends('layouts.main')

@section('title','Админ.Новости')

@section('menu')
    @include ("Admin.menu")
@endsection

@section('content')
    <h1 class="mt-5">Редактирование новостей</h1>
    @include('Admin.News.newsBlock')
    {{ $news->links() }}
@endsection
