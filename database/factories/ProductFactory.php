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
        $user_id = DB::table('users')->select('id')->inRandomOrder()->first();
        $cat_id = DB::table('categories')->select('id')->inRandomOrder()->first();
        $images = [
            "1670580959.jpg",
            "1670580959.jpg",
            "1669621211.jpg",
            "1669621274.jpg",
            "1669621091.jpg",
            "1669620928.jpg",
            "1669621024.jpg",
        ];

        $title = [
            "Lavazza SOAVE A Modo Mio x 32 kapsul",
            "Lavazza Mavi Amabile x100 kapsül",
            "Ahşap kahve karıştırıcı (200 adet)",
            " Kahve makinesi – IDOLA – bir Modo Mio",
            "Kahve makinesi – Jolie Plus – bir Modo Mio",
            " AFES GRAN ESPRESSO X6 Kg",
            "LAVAZZA BLUE kırmızı meyveler x 15 kapsül",
            "Paket Kapsül Lavazza MAVİ",
            "LAVAZZA BLUE Şeftali Çayı x15 Kapsül",
        ];

        return [
            'title' => $title[rand(0,8)],
            'keywords' => $this->faker->word(),
            'image' => $images[rand(1, 7)],
            'description' => $this->faker->sentence(6, true),
            'category_id' => $cat_id->id,
            'detail' => $this->faker->realText(10),
            'price' => rand(1, 500),
            'quantity' => rand(0, 50),
            'minquantity' => rand(1, 50),
            'user_id' => $user_id->id,
            'slug' => $this->faker->slug(),
            'status' => 'True'
        ];
    }
}
