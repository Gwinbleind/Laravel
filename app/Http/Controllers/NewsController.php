<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('news')
            ->with('news',News::getNews());
    }

    public function showArticle(int $id)
    {
        return view('article')
            ->with('article', News::getArticleById($id));
    }

    public function showNewsByCategory($id)
    {
        return view('newsAtCategory')
            ->with('news',News::getNewsByCategory($id))
            ->with('category',Category::getCategoryById($id));
    }

    public function showCategories()
    {
        return view('categories')
            ->with('categories',Category::getCategories());
    }
}
