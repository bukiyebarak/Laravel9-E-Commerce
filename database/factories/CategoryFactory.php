<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    public function definition()
    {
        return [
            'parent_id'=>0,
            'title' => $this->faker->title(),
            'keywords' => $this->faker->words(),
            'image' => $this->faker->image(),
            'description' => $this->faker->realText(100),
            'slug' => $this->faker->slug(),
        ];
    }
}
