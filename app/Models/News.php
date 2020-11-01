<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

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

    public static function rules(News $news)
    {
        $categoryTableName = (new Category)->getTable();
        $userTableName = (new User)->getTable();
        return [
            'title'=>['required','min:5','max:50',Rule::unique('news')->ignore($news)],
            'body'=>['required','min:200'],
            'category_id'=>['required',"exists:{$categoryTableName},id"],
//            'author_id'=>['required',"exists:{$userTableName},id"],
            'is_private'=>'boolean',
            'image'=>['file','mimes:jpeg,jpg,png,bmp'],
        ];
    }

    public static function attributes()
    {
        return [
            'title'=>'Заголовок новости',
            'body'=>'Текст новости',
            'category_id'=>'Категория',
            'author_id'=>'Автор',
            'is_private'=>'Приватность',
            'image'=>'Изображение',
        ];
    }

    public static function messages()
    {
        return [

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
