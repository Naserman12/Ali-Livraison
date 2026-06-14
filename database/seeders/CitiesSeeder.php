<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;

class CitiesSeeder extends Seeder
{
    public function run(): void
    {
        $cities = [

            [
                'name_fr' => 'Niamey',
                'name_ar' => 'نيامي',
            ],

            [
                'name_fr' => 'Maradi',
                'name_ar' => 'مرادي',
            ],

            [
                'name_fr' => 'Zinder',
                'name_ar' => 'زيندر',
            ],

            [
                'name_fr' => 'Tahoua',
                'name_ar' => 'تاوا',
            ],

            [
                'name_fr' => 'Agadez',
                'name_ar' => 'أغاديز',
            ],

            [
                'name_fr' => 'Dosso',
                'name_ar' => 'دوسو',
            ],

            [
                'name_fr' => 'Diffa',
                'name_ar' => 'ديفا',
            ],

            [
                'name_fr' => 'Tillabéri',
                'name_ar' => 'تيلابيري',
            ],
        ];

        foreach ($cities as $city) {
            City::create([
                'name_fr' => $city['name_fr'],
                'name_ar' => $city['name_ar'],
                'is_active' => true,
            ]);
        }
    }
}