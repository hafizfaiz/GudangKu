<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin utama
        User::firstOrCreate(
            ['email' => 'admin@gudangku.com'],
            [
                'name'     => 'Administrator',
                'password' => Hash::make('password'),
                'role'     => 'admin',
            ]
        );

        // Staff gudang
        $staffAccounts = [
            ['name' => 'Budi Santoso',    'email' => 'budi@gudangku.com'],
            ['name' => 'Siti Rahayu',     'email' => 'siti@gudangku.com'],
            ['name' => 'Ahmad Fauzi',     'email' => 'ahmad@gudangku.com'],
            ['name' => 'Dewi Lestari',    'email' => 'dewi@gudangku.com'],
            ['name' => 'Rudi Hartono',    'email' => 'rudi@gudangku.com'],
            ['name' => 'Rina Wulandari',  'email' => 'rina@gudangku.com'],
            ['name' => 'Hendra Gunawan',  'email' => 'hendra@gudangku.com'],
            ['name' => 'Maya Sari',       'email' => 'maya@gudangku.com'],
        ];

        foreach ($staffAccounts as $staff) {
            User::firstOrCreate(
                ['email' => $staff['email']],
                [
                    'name'     => $staff['name'],
                    'password' => Hash::make('password'),
                    'role'     => 'staff',
                ]
            );
        }

        // Test user
        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name'     => 'Test User',
                'password' => Hash::make('password'),
                'role'     => 'staff',
            ]
        );
    }
}
