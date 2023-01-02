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
        User::factory()->count(10)->create();
        $this->call([
            UserSeed::class,
            RoleSeeder::class,
            RoleUserSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            ReviewSeeder::class,
            CitySeeder::class,
            DistrictSeeder::class,
            NeigbourhoodSeeder::class,
            PaketCategorySeeder::class,
            PaketProductSeeder::class,
            SettingSeeder::class,
            MessageSeeder::class,
//    OrderSeeder::class,
//    OrderItemSeeder::class,
        ]);

    }
}
