<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WishlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('wishlists')->insert([
            [
                'user_id'=>11,
                'product_id'=>11,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'user_id'=>11,
                'product_id'=>7,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'user_id'=>11,
                'product_id'=>6,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'user_id'=>11,
                'product_id'=>9,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'user_id'=>11,
                'product_id'=>8,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'user_id'=>11,
                'product_id'=>5,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ]);
    }
}
