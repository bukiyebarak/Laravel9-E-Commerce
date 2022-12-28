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
        $description=[
           " Kahve Kapsülleri",
            "Kapsül ve Öğütülmüş Kahve",
            "Kahve Makineleri",
            "Sıcak İçecekler",
            "Kahve Makineleri / Modo Mio Kahve Makineleri",
            "Kahve Kapsülleri / Lavazza Mavi Kapsüller",
            "Kapsül ve Öğütülmüş Kahve / Delta Kahve Çekirdekleri",
        ];
        $title=[
           "Paket Kapsül Lavazza MAVİ",
            "Delta Kahve Çekirdekleri",
           " Lavazza Mavi Çay",
            "Lavazza Mavi Kapsüller",
            "Modo Mio Kahve Makineleri",
           " Kahve Aksesuarları",
            "Kapsül ve Öğütülmüş Kahve",
        ];

        return [
            'parent_id'=>rand(0,5),
            'title'=>$title[rand(0,6)],
            'keywords'=>$this->faker->word(),
            'image'=>$this->faker->image(),
            'description'=>$description[rand(0,6)],
            'slug'=>$this->faker->slug(),
        ];
    }
}
