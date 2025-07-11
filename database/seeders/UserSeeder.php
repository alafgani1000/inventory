<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {

        // User admin
        User::create([
            'username' => 'admin',
            'password' => Hash::make('admin123'),
            'name' => 'Administrator System',
            'email' => 'admin@inventory.app',
            'role' => 'admin',
            'is_active' => true,
        ]);

        // User manajer
        User::create([
            'username' => 'manager',
            'password' => Hash::make('manager123'),
            'full_name' => 'Manager Gudang',
            'email' => 'manager@inventory.app',
            'role' => 'manager',
            'is_active' => true,
        ]);

        // Staff gudang
        $warehouseStaff = [
            [
                'username' => 'staff1',
                'full_name' => 'Staff Gudang 1',
                'email' => 'staff1@inventory.app',
            ],
            [
                'username' => 'staff2',
                'full_name' => 'Staff Gudang 2',
                'email' => 'staff2@inventory.app',
            ],
            [
                'username' => 'staff3',
                'full_name' => 'Staff Gudang 3',
                'email' => 'staff3@inventory.app',
            ],
        ];

        foreach ($warehouseStaff as $staff) {
            User::create([
                'username' => $staff['username'],
                'password' => Hash::make('password123'),
                'full_name' => $staff['full_name'],
                'email' => $staff['email'],
                'role' => 'staff',
                'is_active' => true,
            ]);
        }

        // Auditor
        User::create([
            'username' => 'auditor',
            'password' => Hash::make('auditor123'),
            'full_name' => 'Auditor Sistem',
            'email' => 'auditor@inventory.app',
            'role' => 'auditor',
            'is_active' => true,
        ]);

        // User tidak aktif
        User::create([
            'username' => 'inactive',
            'password' => Hash::make('password123'),
            'full_name' => 'User Tidak Aktif',
            'email' => 'inactive@inventory.app',
            'role' => 'staff',
            'is_active' => false,
        ]);

        // Buat beberapa user tambahan secara acak
        $faker = \Faker\Factory::create();
        $roles = ['staff', 'staff', 'staff', 'auditor']; // Lebih banyak staff

        for ($i = 0; $i < 5; $i++) {
            $role = $roles[array_rand($roles)];
            $firstName = $faker->firstName;
            $lastName = $faker->lastName;

            User::create([
                'username' => strtolower($firstName . $i),
                'password' => Hash::make('password123'),
                'full_name' => "{$firstName} {$lastName}",
                'email' => strtolower("{$firstName}.{$lastName}{$i}@inventory.app"),
                'role' => $role,
                'is_active' => true,
            ]);
        }
    }
}
