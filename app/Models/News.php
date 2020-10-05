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
            'title'=>'News1',
            'category_id'=>1,
            'body'=>'Text of first article'
        ],
        2 => [
            'id'=>'2',
            'title'=>'News2',
            'category_id'=>2,
            'body'=>'Text of second article'
        ]
    ];

    public static function getNews() {
        return self::$news;
    }

    public static function getArticleById(int $id)
    {
        return self::$news[$id];
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
