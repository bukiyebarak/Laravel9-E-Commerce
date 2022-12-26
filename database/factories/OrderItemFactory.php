<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user_id=DB::table('users')->select('id')->inRandomOrder()->first();
        $order=DB::table('orders')->where('user_id','=',$user_id->id)->inRandomOrder()->first();
        $product=DB::table('products')->inRandomOrder()->first();
        return [
            'order_id' => 1,
            'product_id' => $product->id,
            'price' =>$product->price,
            'quantity' =>1,
            'amount' =>100,
            'total' =>130,
            'user_id' => $user_id->id,
        ];
    }
}
