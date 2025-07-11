<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        /* create roles */
        $roles = [
            'admin',
            'manager',
            'staff',
            'auditor',
        ];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }
        /* end create roles */

        // User admin
        $admin = User::create([
            'password' => Hash::make('admin123'),
            'name' => 'Administrator System',
            'email' => 'admin@inventory.app',
        ]);
        $admin->assignRole('admin');

        // User manajer
        $manager = User::create([
            'password' => Hash::make('manager123'),
            'name' => 'Manager Gudang',
            'email' => 'manager@inventory.app',
        ]);
        $manager->assignRole('manager');

        // Staff gudang
        $warehouseStaff = [
            [
                'full_name' => 'Staff Gudang 1',
                'email' => 'staff1@inventory.app',
            ],
            [
                'full_name' => 'Staff Gudang 2',
                'email' => 'staff2@inventory.app',
            ],
            [
                'full_name' => 'Staff Gudang 3',
                'email' => 'staff3@inventory.app',
            ],
        ];

        foreach ($warehouseStaff as $staff) {
            $staff = User::create([
                'password' => Hash::make('password123'),
                'name' => $staff['full_name'],
                'email' => $staff['email'],
            ]);
            $staff->assignRole('staff');
        }

        // Auditor
        $auditor = User::create([
            'password' => Hash::make('auditor123'),
            'name' => 'Auditor Sistem',
            'email' => 'auditor@inventory.app',
        ]);
        $auditor->assignRole('auditor');


        // Buat beberapa user tambahan secara acak
        $faker = \Faker\Factory::create();
        $roles = ['staff', 'staff', 'staff', 'auditor']; // Lebih banyak staff

        for ($i = 0; $i < 5; $i++) {
            $role = $roles[array_rand($roles)];
            $firstName = $faker->firstName;
            $lastName = $faker->lastName;

            $randomUser = User::create([
                'password' => Hash::make('password123'),
                'name' => "{$firstName} {$lastName}",
                'email' => strtolower("{$firstName}.{$lastName}{$i}@inventory.app")
            ]);
            $randomUser->assignRole($role);
        }
    }
}
