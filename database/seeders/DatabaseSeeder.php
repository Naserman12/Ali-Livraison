<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            RolesSeeder::class,
            CitiesSeeder::class,
            ServiceTypesSeeder::class,
            AdminUserSeeder::class,
        ]);

       $costomer = User::factory()->create([
            'name' => 'Test User',
            'phone' => '90000002',
            'password' => 'password',
            'is_active' => true,
            'email' => 'costomer@example.com',
        ]);
        $costomer->assignRole('customer');
            $courier = User::factory()->create([
                'name' => 'Test Courier',
                'phone' => '90000001',
                'password' => 'password',
                'is_active' => true,
                'email' => 'courier@example.com',
            ]);
    $courier->assignRole('courier');
    }
}
