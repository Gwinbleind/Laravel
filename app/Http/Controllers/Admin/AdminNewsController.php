<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class AdminNewsController extends Controller
{
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
