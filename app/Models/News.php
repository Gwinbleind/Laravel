<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;

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

    public static function rules()
    {
        $categoryTableName = (new Category)->getTable();
        $userTableName = (new User)->getTable();
        return [
            'title'=>['required','min:5','max:50'],
            'body'=>['required','min:200'],
            'category_id'=>['required',"exists:{$categoryTableName},id"],
            'author_id'=>['required',"exists:{$userTableName},id"],
            'is_private'=>'boolean',
            'slug'=>['required','min:5','max:50'],
            'image'=>['file','mime:jpeg,jpg,png,bmp'],
        ];
    }

    public function author()
    {
        return $this->belongsTo(User::class,'author_id')->first();
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id')->first();
    }
}
