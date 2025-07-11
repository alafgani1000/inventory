<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Supplier;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suppliers = [
            [
                'supplier_code' => 'SUP-001',
                'supplier_name' => 'PT Elektronik Maju',
                'contact_person' => 'Budi Santoso',
                'phone' => '08123456789',
                'email' => 'budi@elektronikmaju.com',
                'address' => 'Jl. Teknologi No. 10, Jakarta',
                'is_active' => true,
            ],
            [
                'supplier_code' => 'SUP-002',
                'supplier_name' => 'CV Teknologi Baru',
                'contact_person' => 'Siti Aminah',
                'phone' => '08234567890',
                'email' => 'siti@teknologibaru.co.id',
                'address' => 'Jl. Inovasi No. 20, Bandung',
                'is_active' => true,
            ],
            [
                'supplier_code' => 'SUP-003',
                'supplier_name' => 'UD Komponen Utama',
                'contact_person' => 'Ahmad Fauzi',
                'phone' => '08345678901',
                'email' => 'ahmad@komponenutama.com',
                'address' => 'Jl. Komponen No. 30, Surabaya',
                'is_active' => true,
            ],
            [
                'supplier_code' => 'SUP-004',
                'supplier_name' => 'PT Material Indonesia',
                'contact_person' => 'Dewi Lestari',
                'phone' => '08456789012',
                'email' => 'dewi@materialindonesia.co.id',
                'address' => 'Jl. Material No. 40, Semarang',
                'is_active' => true,
            ],
            [
                'supplier_code' => 'SUP-005',
                'supplier_name' => 'CV Logistik Cepat',
                'contact_person' => 'Rudi Hartono',
                'phone' => '08567890123',
                'email' => 'rudi@logistikcepat.com',
                'address' => 'Jl. Logistik No. 50, Yogyakarta',
                'is_active' => true,
            ],
            [
                'supplier_code' => 'SUP-006',
                'supplier_name' => 'PT Sumber Barang',
                'contact_person' => 'Linda Sari',
                'phone' => '08678901234',
                'email' => 'linda@sumberbarang.com',
                'address' => 'Jl. Sumber No. 60, Medan',
                'is_active' => false, // Supplier tidak aktif
            ],
        ];

        foreach ($suppliers as $supplier) {
            Supplier::create($supplier);
        }
    }
}
