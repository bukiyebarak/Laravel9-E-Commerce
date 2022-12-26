<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
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
            'name' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'email' => $this->faker->email(),
            'address' => $this->faker->address(),
            'phone' =>  $this->faker->phoneNumber(),
            'total' =>rand(30,600),
            'IP' => $this->faker->ipv4(),
            'city' =>  $this->faker->city(),
            'neighbourhood' => $this->faker->city(),
            'user_id' => $user_id->id,
            'district' => $this->faker->streetName(),
            'is_pay'=>'True',
            'zipcode'=>$this->faker->numberBetween(10000,99999),
            'payment'=>'Bank',
        ];
    }
}
