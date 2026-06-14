<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServiceType;

class ServiceTypesSeeder extends Seeder
{
    public function run(): void
    {
        $services = [

            [
                'name_fr' => 'Colis',
                'name_ar' => 'طرود',
                'base_price' => 1500,
                'price_per_km' => 200,
            ],

            [
                'name_fr' => 'Repas',
                'name_ar' => 'وجبات',
                'base_price' => 1000,
                'price_per_km' => 150,
            ],

            [
                'name_fr' => 'Documents',
                'name_ar' => 'مستندات',
                'base_price' => 800,
                'price_per_km' => 100,
            ],

            [
                'name_fr' => 'Courses',
                'name_ar' => 'تسوق',
                'base_price' => 1200,
                'price_per_km' => 180,
            ],
        ];

        foreach ($services as $service) {

            ServiceType::create([
                'name_fr' => $service['name_fr'],
                'name_ar' => $service['name_ar'],
                'base_price' => $service['base_price'],
                'price_per_km' => $service['price_per_km'],
                'is_active' => true,
            ]);
        }
    }
}