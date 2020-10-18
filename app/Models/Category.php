<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug',
    ];

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

    public static function getLocalCategories() {
        return self::$categories;
    }

    public static function getCategories() {
        return DB::table('categories')->get();
    }

    public static function getCategoryBySlug(string $slug)
    {
        return DB::table('categories')->where('slug',$slug)->first();
//        $categories = self::getCategories();
//        foreach ($categories as $category) {
//            if ($category->slug == $slug)
//                return $category;
//        }
//        return [];
    }
}
