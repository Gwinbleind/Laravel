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
            'body'=>'Text of first artycle'
        ],
        2 => [
            'id'=>'2',
            'title'=>'News2',
            'body'=>'Text of second artycle'
        ]
    ];

    public static function getNews() {
        return self::$news;
    }

    public static function getOneArticle(int $id)
    {
        return self::$news[$id];
    }
}
