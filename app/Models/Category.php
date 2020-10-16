<?php

namespace App\Models;

use App\Http\Controllers\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public static function getCategories() {
        return DB::getSection('categories');
    }

    public static function getCategoryById(int $id) {
        return self::getCategories()[$id];
    }

    public static function getCategoryBySlug(string $slug)
    {
        $categories = self::getCategories();
        foreach ($categories as $category) {
            if ($category['slug'] == $slug)
                return $category;
        }
        return [];
    }
}
