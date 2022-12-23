<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
             'name'=>"admin",
             'surname'=>"admin",
             'email'=>"admin@admin.com",
             'email_verified_at' => now(),
             'password'=>bcrypt('123456789'),
         ]);
    }
}
