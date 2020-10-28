<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';
    protected $fillable = ['title','body','category_id','author_id','is_private','slug','image'];
    protected $attributes = [
        'image' => null,
        'author_id' => 1,
        'is_private' => false,
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id')->first();
    }
}
