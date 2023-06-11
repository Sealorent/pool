<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // make users array
        $users = [
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@mail.com',
                'password' => bcrypt('admin'),
                'role_id' => 1,
            ],
            [
                'name' => 'Pak Ardi Manajer',
                'email' => 'manager@mail.com',
                'password' => bcrypt('manager'),
                'role_id' => 2,
            ],
            [
                'name' => 'Pak Budi Officer',
                'email' => 'officer@mail.com',
                'password' => bcrypt('officer'),
                'role_id' => 3,
            ],
            [
                'name' => 'Admin Site 1',
                'email' => 'adminsite1@mail.com',
                'password' => bcrypt('adminsite1'),
                'role_id' => 4,
            ],
            [
                'name' => 'Pak Renald Operator',
                'email' => 'opertor@mail.com',
                'password' => bcrypt('operator1'),
                'role_id' => 5,
            ],
            [
                'name' => 'Pak Yudi Operator',
                'email' => 'operator2@mail.com',
                'password' => bcrypt('operator2'),
                'role_id' => 5,
            ],
            [
                'name' => 'Pak Yudi Operator',
                'email' => 'operator3@mail.com',
                'password' => bcrypt('operator3'),
                'role_id' => 4,
            ],
        ];

        // insert users array
        User::insert($users);
    }
}
