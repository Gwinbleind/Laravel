@extends('layouts.main')

@section('title','Добавление новости')

@section('menu')
    @include ("admin.menu")
@endsection

@section('content')

    <h1 class="mt-5">Добавление новости</h1>
    <form method="post" action="{{ route('admin.add') }}" enctype="multipart/form-data">
        <div class="form-group">
            @csrf
{{--            @dump(old())--}}
            <div class="form-group row">
                <label for="articleTitle">Заголовок новости:</label>
                <input class="form-control" name="title" id="articleTitle" type="text" placeholder="Заголовок"
                    value="{{ old('title') }}">
            </div>  {{--Title--}}
            <div class="form-group row">
                <label for="articleCategory">Категория новости:</label>
                <select class="form-control" name="category_id" id="articleCategory"
                    >
                    @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}" {{ ($category['id']==old('category'))?'selected':'' }}>
                            {{ $category['name'] }}
                        </option>
                    @endforeach
                </select>
            </div>  {{--Category--}}
            <div class="form-group row">
                <label for="articleBody">Текст новости:</label>
                <textarea class="form-control" name="body" id="articleBody" rows="10">{{ old('body') }}</textarea>
            </div>  {{--Body--}}
            <div class="form-group row">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="is_private" id="isPrivate"
                    {{ old('is_private') ? 'checked' : '' }}>
                    <label class="form-check-label" for="isPrivate">Приватная</label>
                </div>
            </div>  {{--Private--}}
            <div class="form-group row">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" name="image">
                    <label class="custom-file-label" for="image">Choose file</label>
                </div>
            </div>  {{--Image--}}
            <button type="submit" class="btn btn-primary mb-2">Отправить</button>
        </div>
    </form>
@endsection
