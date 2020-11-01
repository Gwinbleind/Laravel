<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->sentence;
        return [
            'title'=>$name,
            'slug'=>Str::slug($name, '_'),
            'body'=>$this->faker->realText(),
            'category_id'=>rand(1,10),
            'author_id'=>rand(1,10),
            'is_private'=>false,
            'image'=>null,
        ];
    }
}
