<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;

    private static $news = [
        1 => [
            'id'=>'1',
            'title'=>'Путин в Африке',
            'category_id'=>1,
            "is_private"=>false,
            'slug'=>'putin_at_africa',
            'body'=>'Представьте себе, Путин в Африке!'
        ],
        2 => [
            'id'=>'2',
            'title'=>'Новая картина на миллиард',
            'category_id'=>2,
            "is_private"=>false,
            'slug'=>'new_art_for_milliard',
            'body'=>'Кто-то снова купил картину за миллиард!'
        ]
    ];

    public static function getLocalNews() {
        return self::$news;
    }

    public static function getNews() {
        return DB::table('news')->get();
    }

    public static function getArticleById(int $id)
    {
        return self::getNews()[$id];
    }

    public static function getArticleBySlug(string $slug)
    {
        return DB::table('news')->where('slug',$slug)->first();
//        dd($article);
//        $news = self::getNews();
//        foreach ($news as $item) {
//            if ($item['slug'] == $slug) return $item;
//        }
//        return [];
    }

    public static function getNewsByCategory(int $id)
    {
        return DB::table('news')->where('category_id',$id)->get();
//        $result = [];
//        $news = self::getNews();
//        foreach ($news as $item) {
//            if ($item['category_id'] == $id) {
//                $result[] = $item;
//            }
//        }
//        return $result;
    }

    public static function createArticle(array $article)
    {
//        return DB::putItemToSection('news',$article);
    }
}
