<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//     User::factory(1)->create();
        \App\Models\Review::factory(2)->create();
//        \App\Models\Product::factory(2)->create();
//    $this->call([
//        UserSeed::class,
//        RoleSeeder::class,
//        RoleUserSeeder::class,
//    ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
