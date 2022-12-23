<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_id'=>1,
            'user_id'=>1,
            'subject'=> $this->faker->title(),
            'review'=>$this->faker->realText(50),
            'rate'=>4,
            'status'=>'True'
        ];
    }
}
