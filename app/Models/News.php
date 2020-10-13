<?php

namespace App\Models;

use App\Http\Controllers\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

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
}
