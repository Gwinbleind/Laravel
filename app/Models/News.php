<?php

namespace App\Models;

use App\Http\Controllers\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return DB::getSection('news');
    }

    public static function getArticleById(int $id)
    {
        return self::getNews()[$id];
    }

    public static function getArticleBySlug(string $slug)
    {
        $news = self::getNews();
        foreach ($news as $item) {
            if ($item['slug'] == $slug) return $item;
        }
        return [];
    }

    public static function getNewsByCategory(int $id)
    {
        $result = [];
        $news = self::getNews();
        foreach ($news as $item) {
            if ($item['category_id'] == $id) {
                $result[] = $item;
            }
        }
        return $result;
    }

    public static function createArticle(array $article)
    {
        return DB::putItemToSection('news',$article);
    }
}
