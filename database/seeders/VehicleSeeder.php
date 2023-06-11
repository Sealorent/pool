<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // make array vehicle seeders
        $vehicle = [
            [
                'id' => 1,
                'vehicle_name' => 'DT502',
                'vehicle_type' => 'angkutan_barang',
                'vehicle_owner' => 'perusahaan',
                'vehicle_status' => 'tersedia',
            ],
            [
                'id' => 2,
                'vehicle_name' => 'BIS01',
                'vehicle_type' => 'angkutan_orang',
                'vehicle_owner' => 'perusahaan',
                'vehicle_status' => 'tersedia',
            ],
            [
                'id' => 3,
                'vehicle_name' => 'DT504',
                'vehicle_type' => 'angkutan_barang',
                'vehicle_owner' => 'perusahaan',
                'vehicle_status' => 'tersedia',
            ],
            [
                'id' => 4,
                'vehicle_name' => 'BIS02',
                'vehicle_type' => 'angkutan_orang',
                'vehicle_owner' => 'perusahaan',
                'vehicle_status' => 'tersedia',
            ],
            [
                'id' => 5,
                'vehicle_name' => 'DT505',
                'vehicle_type' => 'angkutan_barang',
                'vehicle_owner' => 'sewa',
                'vehicle_status' => 'tersedia',

            ],
            [
                'id' => 6,
                'vehicle_name' => 'BIS03',
                'vehicle_type' => 'angkutan_orang',
                'vehicle_owner' => 'sewa',
                'vehicle_status' => 'tersedia',
            ]
        ];

        Vehicle::insert($vehicle);
    }
}
