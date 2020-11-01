@extends('layouts.main')

@section('title','Новость')

@section('menu')
    @include ("Admin.menu")
@endsection

@section('content')
    @isset($article)
        <p class="lead">Новость № {{$article->id}}</p>
        <p class="lead">Категория: {{$article->category()->name}}</p>
        <form action="{{ route('admin.news.edit',$article) }}">
            @csrf
            <button type="submit" class="btn btn-warning">Изменить</button>
        </form>
        <form method="post" action="{{ route('admin.news.destroy',$article) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Удалить</button>
        </form>
        <img src="{{ $article->image ?? url('storage/default_article.jpg') }}" alt="Preview image">
        <h1 class="mt-5">{{$article->title}}</h1>
        <p class="lead">
            {{$article->body}}
        </p>
    @endisset
    @empty($article)
        <h1 class="mt-5">Новость не найдена</h1>
        <a href="{{route('news.all')}}">К новостям</a>
    @endempty
@endsection
