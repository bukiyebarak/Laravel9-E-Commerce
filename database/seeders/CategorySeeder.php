<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('en');

        DB::table('categories')->insert([
            [
                'parent_id' => 0,
                'title' => "Kahve Kapsülleri",
                'keywords' => "Kahve Kapsülleri",
                'image' => $faker->image(),
                'description' => "Kahve Kapsülleri",
                'slug' => $faker->slug(),
                'created_at' => now(),
                'updated_at' => now(),
                'main_cat_id' => 0,
                'status'=>"True",
            ],
            [
                'parent_id' => 0,
                'title' => "Kapsül ve Öğütülmüş Kahve",
                'keywords' => "Kapsül ve Öğütülmüş Kahve",
                'image' => $faker->image(),
                'description' => "Kapsül ve Öğütülmüş Kahve",
                'slug' => $faker->slug(),
                'created_at' => now(),
                'updated_at'=> now(),
                'main_cat_id' => 0,
                'status'=>"True",
            ],
            [
                'parent_id' => 0,
                'title' => "Kahve Makineleri",
                'keywords' => "Kahve Makineleri",
                'image' => $faker->image(),
                'description' => "Kahve Makineleri",
                'slug' => $faker->slug(),
                'created_at' => now(),
                'updated_at'=> now(),
                'main_cat_id' => 0,
                'status'=>"True",
            ],
            [
                'parent_id' => 0,
                'title' => "Kahve Aksesuarları",
                'keywords' => "Kahve Aksesuarları",
                'image' => $faker->image(),
                'description' => "Kahve Aksesuarları",
                'slug' => $faker->slug(),
                'created_at' => now(),
                'updated_at'=> now(),
                'main_cat_id' => 0,
                'status'=>"True",
            ],
            [
                'parent_id' => 0,
                'title' => "Sıcak İçecekler",
                'keywords' => "Sıcak İçecekler",
                'image' => $faker->image(),
                'description' => "Sıcak İçecekler",
                'slug' => $faker->slug(),
                'created_at' => now(),
                'updated_at'=> now(),
                'main_cat_id' => 0,
                'status'=>"True",
            ],
            [
                'parent_id' => 1,
                'title' => "Lavazza Mavi Kapsüller",
                'keywords' => "Lavazza Mavi Kapsüller",
                'image' => $faker->image(),
                'description' => "Lavazza Mavi Kapsüller",
                'slug' => $faker->slug(),
                'created_at' => now(),
                'updated_at'=> now(),
                'main_cat_id' => 0,
                'status'=>"True",
            ],
            [
                'parent_id' => 1,
                'title' => "Lavazza A Modo Mio Kapsüller",
                'keywords' => "Lavazza A Modo Mio Kapsüller",
                'image' => $faker->image(),
                'description' => "Lavazza A Modo Mio Kapsüller",
                'slug' => $faker->slug(),
                'created_at' => now(),
                'updated_at'=> now(),
                'main_cat_id' => 0,
                'status'=>"True",
            ],
            [
                'parent_id' => 2,
                'title' => "Delta Kahve Çekirdekleri",
                'keywords' => "Delta Kahve Çekirdekleri",
                'image' => $faker->image(),
                'description' => "Delta Kahve Çekirdekleri",
                'slug' => $faker->slug(),
                'created_at' => now(),
                'updated_at'=> now(),
                'main_cat_id' => 0,
                'status'=>"True",
            ],
            [
                'parent_id' => 3,
                'title' => "Modo Mio Kahve Makineleri",
                'keywords' => "Modo Mio Kahve Makineleri",
                'image' => $faker->image(),
                'description' => "Modo Mio Kahve Makineleri",
                'slug' => $faker->slug(),
                'created_at' => now(),
                'updated_at'=> now(),
                'main_cat_id' => 0,
                'status'=>"True",
            ],
            [
                'parent_id' => 5,
                'title' => "Lavazza Mavi Çay",
                'keywords' => "Lavazza Mavi Çay",
                'image' => $faker->image(),
                'description' => "Lavazza Mavi Çay",
                'slug' => $faker->slug(),
                'created_at' => now(),
                'updated_at'=> now(),
                'main_cat_id' => 0,
                'status'=>"True",
            ],
            [
                'parent_id' => 5,
                'title' => "Lavazza Noktası Çayı",
                'keywords' => "Lavazza Noktası Çayı",
                'image' => $faker->image(),
                'description' => "Lavazza Noktası Çayı",
                'slug' => $faker->slug(),
                'created_at' => now(),
                'updated_at'=> now(),
                'main_cat_id' => 0,
                'status'=>"True",
            ],
            [
                'parent_id' => 1,
                'title' => "Lavazza Espresso Noktası Kapsülleri",
                'keywords' => "Lavazza Noktası Espresso",
                'image' => $faker->image(),
                'description' => "Lavazza Noktası Espresso",
                'slug' => $faker->slug(),
                'created_at' => now(),
                'updated_at'=> now(),
                'main_cat_id' => 0,
                'status'=>"True",
            ],
        ]);
    }
}
