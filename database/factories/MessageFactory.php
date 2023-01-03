<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = \Faker\Factory::create('tr_TR');
        $user_id=DB::table('users')->select('id')->inRandomOrder()->first();
        return [
            'user_id'=>$user_id->id,
            'name'=>$faker->name(),
            'phone' => $faker->numerify('0##########'),
            'email' => $faker->unique()->safeEmail(),
            'subject'=> $this->faker->words(5,true),
            'message'=>$this->faker->realText(50),
            'ip_address'=>$this->faker->ipv4(),
            'status'=>'New',
        ];
    }
}
