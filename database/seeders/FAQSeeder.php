<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FAQSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faqs')->insert([
            [
                'question' => "Kargom ne zaman gelir?",
                'answer' => "Kargo tahmini teslim süresi 3 ile 4 iş günüdür....",
                'status' => "True",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => "What kind of customer service do you offer?",
                'answer' => "Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.",
                'status' => "True",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => "What shipping methods are available?",
                'answer' => " Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.",
                'status' => "True",
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

    }
}
