<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request as Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('News.all')
            ->with('news',News::getNews());
    }

    public function showArticle($slug)
    {
        $article = News::getArticleBySlug($slug);
        return view('News.article')
            ->with('article', $article);
    }

    public function showNewsByCategory(string $slug)
    {
        $category = Category::getCategoryBySlug($slug);
        if ($category !== [])
            return view('News.atCategory')
                ->with('news',News::getNewsByCategory($category['id']))
                ->with('category',$category);
        else return view('404');
    }

    public function showCategories()
    {
        return view('News.categories')
            ->with('categories',Category::getCategories());
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {

            $newSlug = News::createArticle($request->except('_token'));
            if (!empty($newSlug))
                return redirect()->route('news.oneArticle',$newSlug);
            else {
                $request->flash();
                return redirect()->route('admin.add');
            }
        }
        return view('Admin.add')
            ->with('categories',Category::getCategories());
    }
}
