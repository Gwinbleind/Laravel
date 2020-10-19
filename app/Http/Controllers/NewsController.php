<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('News.all')
            ->with('news',News::all());
    }

    public function showArticle($slug)
    {
        $article = News::all()->where('slug',$slug)->first();
//        TODO: При таком написании шторм не возмущается, а как ниже - не видит статический метод where. Причем все равно все работает, но ругается и не подсказывает. Почему? Можно ли так писать?
//        $article = News::where('slug',$slug)->first();
//        dd($article);
//        $article = News::getArticleBySlug($slug);
        return view('News.article')
            ->with('article', $article);
    }

    public function showNewsByCategory(string $slug)
    {
        $category = Category::where('slug',$slug)->get();
//        $category = Category::getCategoryBySlug($slug);
        $news = News::getNewsByCategory($category->id);
        $news = News::where('category_id',$category->id);
        return view('News.atCategory')
            ->with('news',$news)
            ->with('category',$category);
    }

    public function showCategories()
    {
        return view('News.categories')
            ->with('categories',Category::getCategories());
    }

//    public function create(Request $request)
//    {
//        if ($request->isMethod('post')) {
//
//            $newSlug = News::createArticle($request->except('_token'));
//            if (!empty($newSlug))
//                return redirect()->route('news.oneArticle',$newSlug);
//            else {
//                $request->flash();
//                return redirect()->route('admin.add');
//            }
//        }
//        return view('Admin.add')
//            ->with('categories',Category::getCategories());
//    }
}
