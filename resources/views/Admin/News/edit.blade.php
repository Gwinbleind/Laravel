@extends('layouts.main')

@section('title','Изменение новости')

@section('menu')
    @include ("Admin.menu")
@endsection

@section('content')
    <h1 class="mt-5">Изменение новости</h1>
    <form method="post" action="{{ route('admin.news.update',$news) }}" enctype="multipart/form-data">
        <div class="form-group">
            @csrf
            @method('PATCH')
            <img src="{{ $news->image ?? url('storage/default_article.jpg') }}" alt="">
            @include("Admin.News.Subviews.form")
        </div>
    </form>
@endsection
