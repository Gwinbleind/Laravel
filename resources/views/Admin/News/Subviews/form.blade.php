{{--@dd($news)--}}
<div class="form-group row">
    <label for="articleTitle">Заголовок новости:</label>
    <input class="form-control {{$errors->has('title')?'is-invalid':($errors->all()?'is-valid':'')}}"
           name="title" id="articleTitle" type="text" placeholder="Заголовок"
           value="{{ $news->title }}">
    @include("Admin.News.Subviews.errorMessage",['field'=>'title'])
</div>  {{--Title--}}
<div class="form-group row">
    <label for="articleCategory">Категория новости:</label>
    <select class="form-control {{$errors->has('category_id')?'is-invalid':($errors->all()?'is-valid':'')}}"
            name="category_id" id="articleCategory">
        <option value="123">
            Неправильная категория
        </option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ ($category->id==$news->category_id)?'selected':'' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    @include("Admin.News.Subviews.errorMessage",['field'=>'category_id'])
</div>  {{--Category--}}
<div class="form-group row">
    <label for="articleBody">Текст новости:</label>
    <textarea class="form-control {{$errors->has('body')?'is-invalid':($errors->all()?'is-valid':'')}}"
              name="body" id="articleBody" rows="10">{{ $news->body }}</textarea>
    @include("Admin.News.Subviews.errorMessage",['field'=>'body'])
</div>  {{--Body--}}
<div class="form-group row">
    <div class="form-check">
        <input class="form-check-input {{$errors->has('is_private')?'is-invalid':($errors->all()?'is-valid':'')}}"
               type="checkbox" name="is_private" id="isPrivate" value="1"
            {{ $news->is_private ? 'checked' : '' }}>
        <label class="form-check-label" for="isPrivate">Приватная</label>
        @include("Admin.News.Subviews.errorMessage",['field'=>'is_private'])
    </div>
</div>  {{--Private--}}
<div class="form-group row">
    <div class="custom-file">
        <input class="custom-file-input {{$errors->has('image')?'is-invalid':($errors->all()?'is-valid':'')}}"
               type="file" id="image" name="image">
        <label class="custom-file-label" for="image">Choose file</label>
    </div>
    @include("Admin.News.Subviews.errorMessage",['field'=>'image'])
</div>  {{--Image--}}
<button type="submit" class="btn btn-primary mb-2">Отправить</button>
