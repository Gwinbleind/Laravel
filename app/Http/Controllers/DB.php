<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DB extends Controller
{
    private static $json_file='news/db.json';

    public static function getSection(string $section)
    {
        $file_db = Storage::get(self::$json_file);
        return json_decode($file_db,true)[$section];
    }
}
