@extends('layouts.main')

@section('title','Добавление новости')

@section('menu')
    @include ("menu")
@endsection

@section('content')
    <h1 class="mt-5">Добавление новости</h1>
    <form>
        <div class="form-group">
            <div class="form-group row">
                <label for="articleTitle">Заголовок новости:</label>
                <input class="form-control" id="articleTitle" type="text" placeholder="Заголовок">
            </div>
            <div class="form-group row">
                <label for="articleBody">Текст новости:</label>
                <textarea class="form-control" id="articleBody" rows="10"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Отправить</button>
        </div>
    </form>
@endsection
