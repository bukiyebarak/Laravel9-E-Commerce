<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'parent_id'=>rand(0,5),
            'title'=>$this->faker->word(),
            'keywords'=>$this->faker->word(),
            'image'=>$this->faker->image(),
            'description'=>$this->faker->realText(20),
            'slug'=>$this->faker->slug(),
        ];
    }
}
