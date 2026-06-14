<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrCreate(
            [
                'email' => 'admin@alilivraison.com'
            ],
            [
                'name' => 'Super Admin',
                'phone' => '90000000',
                'password' => Hash::make('Admin1234'),
                'is_active' => true,
            ]
        );

        $admin->assignRole('admin');
    }
}