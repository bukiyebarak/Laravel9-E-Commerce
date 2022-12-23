<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        $user_id=DB::table('users')->select('id')->where('email','=','admin@admin.com')->first();
        $role_id=DB::table('roles')->select('id')->where('name','=','admin')->first();

        DB::table('role_user')->insert([
            'role_id'=>$user_id->id,
            'user_id'=>$role_id->id,
        ]);
    }
}
