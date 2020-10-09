<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;

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
}
