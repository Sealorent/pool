<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // run all seeders
        $this->call([
            RoleSeeder::class,
            UsersSeeder::class,
            VehicleSeeder::class,
        ]);
    }
}
