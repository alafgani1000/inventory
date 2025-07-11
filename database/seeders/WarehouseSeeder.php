<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Warehouse;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $warehouses = [
            [
                'warehouse_code' => 'WH-001',
                'warehouse_name' => 'Gudang Utama',
                'address' => 'Jl. Industri Raya No. 123, Jakarta',
                'is_active' => true,
            ],
            [
                'warehouse_code' => 'WH-002',
                'warehouse_name' => 'Gudang Cadangan',
                'address' => 'Jl. Logistik No. 45, Tangerang',
                'is_active' => true,
            ],
            [
                'warehouse_code' => 'WH-003',
                'warehouse_name' => 'Gudang Barang Jadi',
                'address' => 'Jl. Produksi No. 67, Bekasi',
                'is_active' => true,
            ],
            [
                'warehouse_code' => 'WH-004',
                'warehouse_name' => 'Gudang Bahan Baku',
                'address' => 'Jl. Material No. 89, Cikarang',
                'is_active' => true,
            ],
            [
                'warehouse_code' => 'WH-005',
                'warehouse_name' => 'Gudang Distribusi',
                'address' => 'Jl. Distribusi No. 10, Depok',
                'is_active' => true,
            ],
        ];

        foreach ($warehouses as $warehouse) {
            Warehouse::create($warehouse);
        }
    }
}
