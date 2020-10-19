<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str as StrL;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';
    protected $fillable = ['title','body','category_id','author_id','is_private','slug','image'];
    protected $attributes = [
        'image' => null,
        'author_id' => 1,
        'is_private' => false,
    ];


    public static function getNews() {
        return DB::table('news')->get();
    }

    public static function getArticleBySlug(string $slug)
    {
        return DB::table('news')->where('slug',$slug)->first();
    }

    public static function getNewsByCategory(int $id)
    {
        return DB::table('news')->where('category_id',$id)->get();
    }

    public static function createArticle(array $article)
    {
        try {
            $url = null;
            if (request()->file('image')) {
                $path = Storage::putFile('public/images',request()->file('image'));
                $url = Storage::url($path);
            }
            $article['image'] = $url;
            $article['is_private'] = isset($article['is_private']);
            $article['slug'] = StrL::slug($article['title'],'_');
            DB::table('news')->insert($article);
        } catch (\Exception $e) {
            dump($e);
            return '';
        }
        return $article['slug'];
    }
}
