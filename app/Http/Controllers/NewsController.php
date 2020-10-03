<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('news')->with('news',News::getNews());
    }

    public function show(int $id)
    {
        return view('article')->with('article', News::getOneArticle($id));
    }
}
