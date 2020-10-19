<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug',
    ];

    public static function getCategories() {
        return DB::table('categories')->get();
    }

    public static function getCategoryBySlug(string $slug)
    {
        return DB::table('categories')->where('slug',$slug)->first();
    }
}
