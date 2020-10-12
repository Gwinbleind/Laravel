<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    public static $news = [
        1 => [
            'id'=>'1',
            'title'=>'Путин в Африке',
            'category_id'=>1,
            'slug'=>'putin_at_africa',
            'body'=>'Представьте себе, Путин в Африке!'
        ],
        2 => [
            'id'=>'2',
            'title'=>'Новая картина на миллиард',
            'category_id'=>2,
            'slug'=>'new_art_for_milliard',
            'body'=>'Кто-то снова купил картину за миллиард!'
        ]
    ];

    public static function getNews() {
        return self::$news;
    }

    public static function getArticleById(int $id)
    {
        return self::$news[$id];
    }

    public static function getArticleBySlug(string $slug)
    {
        foreach (self::$news as $item) {
            if ($item['slug'] == $slug) return $item;
        }
        return [];
    }

    public static function getNewsByCategory(int $id)
    {
        $result = [];
        foreach (self::$news as $item) {
            if ($item['category_id'] == $id) {
                $result[] = $item;
            }
        }
        return $result;
    }
}
