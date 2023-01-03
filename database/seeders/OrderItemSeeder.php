<?php

namespace Database\Seeders;

use App\Models\Orderitem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orderitems')->insert([
            [
                'user_id'=>11,
                'order_id'=>1,
                'product_id'=>1,
                'price'=>35,
                'quantity'=>1,
                'amount'=>35,
                'total'=>65,
                'status'=>"New",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'user_id'=>11,
                'order_id'=>2,
                'product_id'=>6,
                'price'=>50,
                'quantity'=>1,
                'amount'=>50,
                'total'=>276.50,
                'status'=>"New",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'user_id'=>11,
                'order_id'=>2,
                'product_id'=>9,
                'price'=>250,
                'quantity'=>1,
                'amount'=>250,
                'total'=>276.50,
                'status'=>"New",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'user_id'=>11,
                'order_id'=>3,
                'product_id'=>12,
                'price'=>100,
                'quantity'=>1,
                'amount'=>100,
                'total'=>130,
                'status'=>"New",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

        ]);
    }
}
