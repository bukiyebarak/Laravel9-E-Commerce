<?php

namespace Database\Seeders;

use App\Models\Orderitem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Orderitem::factory()->count(2)->create();
    }
}
