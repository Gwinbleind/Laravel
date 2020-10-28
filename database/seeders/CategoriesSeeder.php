<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
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

        for ($i = 0;$i < 10;$i++) {
            $name = $faker->unique()->word;
            $data[] = [
                'name'=>$name,
                'slug'=>Str::slug($name, '_'),
            ];
        }

        DB::table('categories')->insert($data);

//        Category::factory()->times(10)->create();
//        TODO: Переделать на фабрику, когда разберемся, чего не хватает
    }
}
