<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Elektronik' => ['Kabel', 'Adaptor', 'Charger', 'Power Bank'],
            'Komputer' => ['Mouse', 'Keyboard', 'Monitor', 'Laptop'],
            'Jaringan' => ['Router', 'Switch', 'Access Point', 'Kabel Jaringan'],
            'Perkakas' => ['Obeng', 'Tang', 'Palu', 'Meteran'],
            'Konsumsi' => ['Air Mineral', 'Snack', 'Kopi', 'Teh'],
        ];

        $units = ['pcs', 'unit', 'pack', 'dus', 'meter', 'kg', 'liter'];

        $items = [];
        $skuCounter = 1;

        foreach ($categories as $category => $subcategories) {
            foreach ($subcategories as $subcategory) {
                // Buat 3-5 item per subkategori
                $itemCount = rand(3, 5);

                for ($i = 1; $i <= $itemCount; $i++) {
                    $unit = $units[array_rand($units)];
                    $minStock = rand(5, 20);
                    $leadTime = rand(1, 14);

                    $items[] = [
                        'item_sku' => 'ITM-' . str_pad($skuCounter++, 5, '0', STR_PAD_LEFT),
                        'item_name' => "{$subcategory} {$category} " . $this->generateItemName($subcategory, $i),
                        'description' => "Deskripsi untuk {$subcategory} {$category} tipe " . ($i),
                        'unit_of_measure' => $unit,
                        'min_stock_level' => $minStock,
                        'lead_time_days' => $leadTime,
                        'is_active' => true,
                    ];
                }
            }
        }

        // Buat beberapa item tidak aktif
        for ($i = 0; $i < 5; $i++) {
            if (isset($items[$i])) {
                $items[$i]['is_active'] = false;
            }
        }

        // Tambahkan item khusus
        $specialItems = [
            [
                'item_sku' => 'ITM-SPECIAL-001',
                'item_name' => 'Kabel HDMI Premium 2m',
                'description' => 'Kabel HDMI kualitas tinggi dengan panjang 2 meter',
                'unit_of_measure' => 'pcs',
                'min_stock_level' => 15,
                'lead_time_days' => 7,
                'is_active' => true,
            ],
            [
                'item_sku' => 'ITM-SPECIAL-002',
                'item_name' => 'Adaptor Universal 65W',
                'description' => 'Adaptor universal untuk berbagai perangkat laptop',
                'unit_of_measure' => 'unit',
                'min_stock_level' => 10,
                'lead_time_days' => 10,
                'is_active' => true,
            ],
        ];

        $items = array_merge($items, $specialItems);

        // Insert semua item
        Item::insert($items);
    }

    private function generateItemName($subcategory, $index)
    {
        $sizes = ['Kecil', 'Sedang', 'Besar', 'Ekstra Besar'];
        $colors = ['Hitam', 'Putih', 'Merah', 'Biru', 'Hijau'];
        $types = ['Standard', 'Premium', 'Pro', 'Lite'];

        $size = $sizes[array_rand($sizes)];
        $color = $colors[array_rand($colors)];
        $type = $types[array_rand($types)];

        return "{$size} {$color} {$type} " . ($index % 3 == 0 ? 'Series' : 'Edition');
    }

}
