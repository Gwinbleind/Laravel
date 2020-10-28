<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        return view('Admin.News.add')->with('categories',Category::all());
    }

    public function store(Request $request)
    {
        $article = new News();
        $article->fill($request->all());
        $this->validate($request,News::rules());

        if (request()->file('image')) {
            $path = Storage::putFile('public/images',request()->file('image'));
            $article->image = Storage::url($path);
        }
        $article->is_private = isset($article->is_private);
        $article->slug = StrL::slug($article->title,'_');
        try {
            $article->save();
        } catch (\Exception $e) {
            return back()->withInput();
        }
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
        if (request()->file('image')) {
            $path = Storage::putFile('public/images',request()->file('image'));
            $news->image = Storage::url($path);
        }
        $news->is_private = $request->input('is_private') !== null;
        try {
            $news->save();
        } catch (\Exception $e) {
            return back()->withInput();
        }
        return redirect()->route('news.oneArticle',$news->slug);
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('admin.news.index');
    }
}
