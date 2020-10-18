<?php

namespace Database\Seeders;

use App\Models\News;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('ru_RU');
        $data = [];

        for ($i = 0;$i < 20;$i++) {
            $name = $faker->unique()->sentence;
            $data[] = [
                'title'=>$name,
                'slug'=>Str::slug($name),
                'body'=>$faker->text,
                'category_id'=>rand(1,10),
                'author_id'=>rand(1,10),
                'is_private'=>false,
                'image'=>null,
            ];
        }

        DB::table('news')->insert($data);

//        News::factory()->times(10)->create();
//        TODO: Переделать на фабрику, когда разберемся, чего не хватает
    }
}
