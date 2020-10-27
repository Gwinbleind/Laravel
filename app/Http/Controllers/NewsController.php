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
            ->with('news', News::query()->paginate(5));
    }

    public function showArticle($slug)
    {
        return view('News.article')
            ->with('article', News::query()->where('slug',$slug)->first());
    }

    public function showNewsByCategory(string $slug)
    {
        $category = Category::query()->where('slug',$slug)->first();
        return view('News.atCategory')
            ->with('news', $category->news()->paginate(5))
            ->with('category',$category);
    }

    public function showCategories()
    {
        return view('News.categories')
            ->with('categories',Category::all());
    }
}
