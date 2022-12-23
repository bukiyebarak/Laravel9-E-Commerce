<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user_id=DB::table('users')->select('id')->inRandomOrder()->first();
        return [
            'title' => $this->faker->title(),
            'keywords' => $this->faker->word(),
            'image' => $this->faker->image(),
            'description' => $this->faker->words(),
            'category_id' => 1,
            'detail' => Str::random(15),
            'price' => rand(1,500),
            'quantity' => rand(0,40),
            'minquantity' => rand(1,50),
            'user_id' => $user_id->id,
            'slug' => $this->faker->slug(),
            'status'=>'True'

        ];
    }
}
