<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\News;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class saveJson extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'save:json';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Сохраняет в json файл все новости и категории из внутреннего хранилища класса';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $arr['news'] = News::getLocalNews();
        $arr['categories'] = Category::getLocalCategories();
        $json = json_encode($arr,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        Storage::put('news/db.json',$json);
    }
}
