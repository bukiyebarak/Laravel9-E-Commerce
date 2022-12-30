<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

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
        $user_id=DB::table('users')->select('id')->inRandomOrder()->first();

        $product_id=DB::table('products')->select('id')->inRandomOrder()->first();

        return [
            'product_id'=>$product_id->id,
            'user_id'=>$user_id->id,
            'subject'=> $this->faker->words(5,true),
            'review'=>$this->faker->realText(50),
            'rate'=>rand(1,5),
            'IP'=>$this->faker->ipv4(),
            'status'=>'True',
             'created_at'=>now(),
        ];
    }
}
