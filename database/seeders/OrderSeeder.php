<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            [
                'user_id'=>11,
                'name'=>"admin",
                'surname'=>"admin",
                'city'=>"ADANA",
                'district'=>"CEYHAN",
                'neighbourhood'=>"AYDEMİROĞLU",
                'zipcode'=>00000,
                'email'=>"admin@admin.com",
                'address'=>"Order Address",
                'phone'=>"06364363939",
                'total'=>65,
                'IP'=>"127.0.0.1",
                'is_pay'=>"True",
                'payment'=>"bank",
                'status'=>"New",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'user_id'=>11,
                'name'=>"admin",
                'surname'=>"admin",
                'city'=>"ADIYAMAN",
                'district'=>"ÇELİKHAN",
                'neighbourhood'=>"BAŞPINAR",
                'zipcode'=>00000,
                'email'=>"admin@admin.com",
                'address'=>"Order Address",
                'phone'=>"06364363939",
                'total'=>276.50,
                'IP'=>"127.0.0.1",
                'is_pay'=>"True",
                'payment'=>"bank",
                'status'=>"Shipping",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'user_id'=>11,
                'name'=>"admin",
                'surname'=>"admin",
                'city'=>"ÇANKIRI",
                'district'=>"MERKEZ",
                'neighbourhood'=>"AKSU",
                'zipcode'=>00000,
                'email'=>"admin@admin.com",
                'address'=>"Order Address",
                'phone'=>"06364363939",
                'total'=>40,
                'IP'=>"127.0.0.1",
                'is_pay'=>"True",
                'payment'=>"bank",
                'status'=>"New",
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ]);
    }
}
