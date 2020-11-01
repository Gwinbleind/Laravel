<?php

namespace App\Http\Requests;

use App\Models\Category;
use App\Models\News;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveNewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @param News $news
     * @return array
     */
    public function rules(News $news)
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

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
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
}
