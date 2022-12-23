<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'title'=>"Ecommerce",
            'keywords'=>"Ecommerce",
            'description'=>"Ecommerce",
            'company'=>"Ecommerce",
            'address'=>"Ecommerce",
            'phone'=>"123456789",
            'fax'=>"123456789",
            'email'=>"admin@admin.com",
            'facebook'=>"https://tr-tr.facebook.com/",
            'instagram'=>"#",
            'twitter'=>"#",
            'linkedin'=>"#",
        ]);
    }
}
