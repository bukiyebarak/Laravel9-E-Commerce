<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaketCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('paket_categories')->insert([
            [
                'paket_parent_id'=>0,
                'title'=>"Paket Kapsüller Lavazza A Modo Mio",
                'keywords'=>"paket lavazza",
                'description'=>"Paket Kapsüller Lavazza A Modo",
                'slug'=>"paket-lavazza",
                'created_at'=>now(),
                'status'=>'True',
            ],
            [
                'paket_parent_id'=>0,
                'title'=>"Paket Kapsül Lavazza Mavii",
                'keywords'=>"paket lavazza mavi",
                'description'=>"Paket Kapsüller Lavazza Mavi ",
                'slug'=>"paket-lavazza-mavi",
                'created_at'=>now(),
                'status'=>'True',
            ],

        ]);
    }
}
