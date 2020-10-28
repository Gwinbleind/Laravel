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
            <div class="form-group row">
                <label for="articleTitle">Заголовок новости:</label>
                <input class="form-control" name="title" id="articleTitle" type="text" placeholder="Заголовок"
                    value="{{ $news->title }}">
            </div>  {{--Title--}}
            <div class="form-group row">
                <label for="articleCategory">Категория новости:</label>
                <select class="form-control" name="category_id" id="articleCategory"
                    >
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ ($category->id==$news->category_id)?'selected':'' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>  {{--Category--}}
            <div class="form-group row">
                <label for="articleBody">Текст новости:</label>
                <textarea class="form-control" name="body" id="articleBody" rows="10">{{ $news->body }}</textarea>
            </div>  {{--Body--}}
            <div class="form-group row">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="is_private" id="isPrivate" value="1"
                    {{ $news->is_private ? 'checked' : '' }}>
                    <label class="form-check-label" for="isPrivate">Приватная</label>
                </div>
            </div>  {{--Private--}}
            <div class="form-group row">
                @isset($news->image)
                    <img src="{{ $news->image ?? url('storage/default_article.jpg') }}" alt="">
                @endisset
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" name="image">
                    <label class="custom-file-label" for="image">Заменить изображение</label>
                </div>
            </div>  {{--Image--}}
            <button type="submit" class="btn btn-primary mb-2">Отправить</button>
        </div>
    </form>
@endsection
