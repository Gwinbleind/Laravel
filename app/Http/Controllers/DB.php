<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str as StrL;

class DB extends Controller
{
    private static $json_file='news/db.json';
    public static $images_dir='public/images';

    public static function getAll()
    {
        $file_db = Storage::get(self::$json_file);
        return json_decode($file_db,true);
    }

    public static function getSection(string $section)
    {
        return self::getAll()[$section];
    }

    private static function testArticleData(array $item): bool
    {
        return empty(News::getArticleBySlug(StrL::slug($item['title'],'_'))) && !empty($item['body']);
    }

    public static function putItemToSection(string $section, array $item)
    {
//        dd($item);
        if (self::testArticleData($item)) {
            $url = null;
            if (request()->file('image')) {
                $path = Storage::putFile(self::$images_dir,request()->file('image'));
                $url = Storage::url($path);
            }
            $item['image'] = $url;
            $item['is_private'] = isset($item['is_private']);
            $item['slug'] = StrL::slug($item['title'],'_');
            $json = self::getAll();
            $section_data = &$json[$section];
            $item['id'] = array_key_last($section_data)+1;
            $section_data[$item['id']] = $item;
            Storage::put(self::$json_file,json_encode($json,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
            return $item['slug'];
        }
        else return '';
    }
}
