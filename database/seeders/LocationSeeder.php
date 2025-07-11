<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Location;
use App\Models\Warehouse;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $warehouses = Warehouse::all();

        $locationTypes = ['Rak', 'Palet', 'Area Khusus', 'Bin', 'Shelf'];
        $locationStatuses = [true, true, true, true, false]; // Satu lokasi tidak aktif

        foreach ($warehouses as $warehouse) {
            $locations = [];

            // Buat 10-15 lokasi per gudang
            $locationCount = rand(10, 15);

            for ($i = 1; $i <= $locationCount; $i++) {
                $type = $locationTypes[array_rand($locationTypes)];
                $status = $locationStatuses[array_rand($locationStatuses)];

                $locations[] = [
                    'warehouse_id' => $warehouse->warehouse_id,
                    'location_code' => $type . '-' . str_pad($i, 3, '0', STR_PAD_LEFT),
                    'location_name' => "{$type} {$i}",
                    'is_active' => $status,
                ];
            }

            Location::insert($locations);
        }

        // Buat lokasi khusus untuk gudang utama
        $mainWarehouse = Warehouse::where('warehouse_code', 'WH-001')->first();

        if ($mainWarehouse) {
            $specialLocations = [
                [
                    'warehouse_id' => $mainWarehouse->warehouse_id,
                    'location_code' => 'RECEIVING',
                    'location_name' => 'Area Penerimaan',
                    'is_active' => true,
                ],
                [
                    'warehouse_id' => $mainWarehouse->warehouse_id,
                    'location_code' => 'SHIPPING',
                    'location_name' => 'Area Pengiriman',
                    'is_active' => true,
                ],
                [
                    'warehouse_id' => $mainWarehouse->warehouse_id,
                    'location_code' => 'QUARANTINE',
                    'location_name' => 'Area Karantina',
                    'is_active' => true,
                ],
            ];

            Location::insert($specialLocations);
        }
    }
}
