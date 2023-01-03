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
            'title'=>"Ecommerce Title",
            'keywords'=>"Ecommerce Keywords",
            'description'=>"Ecommerce Description",
            'company'=>"Ecommerce Company",
            'address'=>"Ecommerce Address",
            'phone'=>"123456789",
            'fax'=>"123456789",
            'email'=>"admin@admin.com",
            'facebook'=>"https://tr-tr.facebook.com/",
            'instagram'=>"https://www.instagram.com/",
            'twitter'=>"https://twitter.com/?lang=tr",
            'linkedin'=>"https://tr.linkedin.com/",
            'references'=>" Referanslar Bölümü",
            'aboutus'=>" Hakkımızda Bölümü",
        ]);
    }
}
