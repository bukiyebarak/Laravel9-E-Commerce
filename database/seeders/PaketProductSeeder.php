<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaketProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('paket_products')->insert([
            [
                'paket_category_id'=>1,
                'category_id'=>7,
                'user_id'=>1,
                'title'=>"Pack Capsules Lavazza A Modo Mio",
                'keywords'=>"lavazza, mavi",
                'description'=>"Almak istediğiniz Lavazza A Modo Mio x100 kapsül...",
                'detail'=>"paket detail",
                'price'=>0,
                'quantity'=>300,
                'tax'=>18,
                'status'=>"True",
                'image'=>"1672209633.jpg",
                'slug'=>"pack-capsules-lavazza-a-modo-mio",
            ],
            [
                'paket_category_id'=>2,
                'category_id'=>6,
                'user_id'=>1,
                'title'=>"Paket Kapsül Lavazza MAVİ",
                'keywords'=>"lavazza, mavi",
                'description'=>"Almak istediğiniz Lavazza Blue x100 kapsül paket s...",
                'detail'=>"paket detail",
                'price'=>0,
                'quantity'=>300,
                'tax'=>18,
                'status'=>"True",
                'image'=>"1672228753.jpg",
                'slug'=>"lavazza-mavi",
            ],
            [
                'paket_category_id'=>3,
                'category_id'=>12,
                'user_id'=>1,
                'title'=>"Paket Kapsüller Lavazza Espresso Noktası",
                'keywords'=>"lavazza, mavi",
                'description'=>"Almak istediğiniz Lavazza Espresso Point x100 kapsül paket sayısını seçin ve %15 indirimden yararlanın.",
                'detail'=>"paket detail",
                'price'=>0,
                'quantity'=>300,
                'tax'=>18,
                'status'=>"True",
                'image'=>"1672744285.jpg",
                'slug'=>"pack-capsules-lavazza-espresso-point",
            ],
        ]);
    }
}
