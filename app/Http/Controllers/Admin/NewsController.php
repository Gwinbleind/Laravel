<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveNewsRequest;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str as StrL;

class NewsController extends Controller
{
    public function index()
    {
        return view('Admin.News.all')->with('news',News::query()->paginate(10));
    }

    public function create()
    {
        $news = new News();
//        Comment: Можно ли облагородить нижеследующее? Захотел избавиться от дублирования формы в добавлении и изменении, вынес ее в шаблон. Только значения по умолчанию инпутов у них разные - в добавлении используется хелпер old(), в изменении модель News. Перенес данные из хелпера в модель. Есть ли вообще смысл так изгаляться ради уменьшения шаблонов?
        $news->title = old('title') ?? '';
        $news->category_id = old('category_id') ?? '';
        $news->body = old('body') ?? '';
        $news->is_private = old('is_private') ?? '';
        return view('Admin.News.add')->with('categories',Category::all())
            ->with('news',$news);
    }

    public function store(SaveNewsRequest $request)
    {
        $article = new News();
        $article->fill($request->all());
//        $request->validate(News::rules($article),News::messages(),News::attributes());
//        $request->validate($request->rules($news),$request->messages(),$request->attributes());
        $request->validated();

        if (request()->file('image')) {
            $path = Storage::putFile('public/images',request()->file('image'));
            $article->image = Storage::url($path);
        }
        $article->is_private = isset($article->is_private);
        $article->slug = StrL::slug($article->title,'_');
        $article->save();

        return redirect()->route('news.oneArticle',$article->slug);
    }

    public function show(News $news)
    {
        return view('Admin.News.article')->with('article',$news);
    }

    public function edit(News $news)
    {
        return view('admin.news.edit')
            ->with('categories',Category::all())
            ->with('news',$news);
    }

    public function update(Request $request, News $news)
    {
        $news->fill($request->all());
        $request->validate(News::rules($news),News::messages(),News::attributes());
//        TODO: Подумать, как сделать валидацию через свой request вместо модели
//        $request->validate($request->rules($news),$request->messages(),$request->attributes());
//        $request->validated();

        if (request()->file('image')) {
            $path = Storage::putFile('public/images',request()->file('image'));
            $news->image = Storage::url($path);
        }
        $news->is_private = $request->input('is_private') !== null;
        $news->save();

        return redirect()->route('news.oneArticle',$news->slug);
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('admin.news.index');
    }
}
