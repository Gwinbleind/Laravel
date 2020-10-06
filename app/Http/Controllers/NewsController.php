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
            ->with('news',News::getNews());
    }

    public function showArticle($slug)
    {
        return view('News.article')
            ->with('article',News::getArticleBySlug($slug));
    }

    public function showNewsByCategory(string $slug)
    {
        $category = Category::getCategoryBySlug($slug);
        return view('News.atCategory')
            ->with('news',News::getNewsByCategory($category['id']))
            ->with('category',$category);
    }

    public function showCategories()
    {
        return view('News.categories')
            ->with('categories',Category::getCategories());
    }
}
