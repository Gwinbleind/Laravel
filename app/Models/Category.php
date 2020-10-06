<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    private static $categories = [
        1=>[
            'id'=>1,
            'parent_id'=>null,
            'name'=>'Политика',
            'slug'=>'politics'
        ],
        2=>[
            'id'=>2,
            'parent_id'=>null,
            'name'=>'Культура и Искусство',
            'slug'=>'culture'
        ],
        3=>[
            'id'=>3,
            'parent_id'=>null,
            'name'=>'Наука и Технологии',
            'slug'=>'science'
        ],
        4=>[
            'id'=>4,
            'parent_id'=>null,
            'name'=>'Происшествия',
            'slug'=>'incidents'
        ],
    ];

    public static function getCategories() {
        return self::$categories;
    }

    public static function getCategoryById(int $id) {
        return self::$categories[$id];
    }

    public static function getCategoryBySlug(string $slug)
    {
        foreach (self::$categories as $category) {
            if ($category['slug'] == $slug)
                return $category;
        }
        return [];
    }
}
