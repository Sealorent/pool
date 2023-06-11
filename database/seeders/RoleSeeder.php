<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // make role seeder array
        $roles = [
            [
                'id' => 1,
                'name' => 'Super Admin',
            ],
            [
                'id' => 2,
                'name' => 'Manager',
            ],
            [
                'id' => 3,
                'name' => 'Officer',
            ],
            [
                'id' => 4,
                'name' => 'Admin Site',
            ],
            [
                'id' => 5,
                'name' => 'Operator',
            ],
        ];

        // insert role seeder array
        Role::insert($roles);
    }
}
