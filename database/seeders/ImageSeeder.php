<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            [
                'product_id'=> 1,
                'title'=>"Title",
                'image'=>"1672743688.jpg",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'product_id'=> 2,
                'title'=>"Title",
                'image'=>"1672743695.jpg",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'product_id'=>3,
                'title'=>"Title",
                'image'=>"1672743702.jpg",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'product_id'=> 4,
                'title'=>"Title",
                'image'=>"1672743711.jpg",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'product_id'=> 5,
                'title'=>"Title",
                'image'=>"1672743720.jpg",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'product_id'=> 6,
                'title'=>"Title",
                'image'=>"1672743735.jpg",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'product_id'=>7 ,
                'title'=>"Title",
                'image'=>"1672743747.jpg",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'product_id'=> 8,
                'title'=>"Title",
                'image'=>"1672743757.jpg",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'product_id'=> 9,
                'title'=>"Title",
                'image'=>"1672743769.jpg",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'product_id'=> 10,
                'title'=>"Title",
                'image'=>"1672743778.jpg",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'product_id'=>11 ,
                'title'=>"Title",
                'image'=>"1672743792.jpg",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'product_id'=> 12,
                'title'=>"Title",
                'image'=>"1672743803.jpg",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ]);
    }
}
