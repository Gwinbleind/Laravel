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
    public function create(Request $request)
    {
//        dump($request);
        if ($request->isMethod('post')) {
            $article = new News();
            $article->fill($request->all());
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
        return view('Admin.add')->with('categories',Category::all());
    }
}
