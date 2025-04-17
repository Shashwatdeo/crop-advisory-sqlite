<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CropSuggestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('crop_suggestions')->insert([
            [
                'crop_name' => 'Wheat',
                'region' => 'North',
                'soil_type' => 'Loamy',
                'season' => 'Winter',
                'water_availability' => 'Medium'
            ],
            [
                'crop_name' => 'Rice',
                'region' => 'East',
                'soil_type' => 'Clayey',
                'season' => 'Monsoon',
                'water_availability' => 'High'
            ],
            [
                'crop_name' => 'Corn',
                'region' => 'Central',
                'soil_type' => 'Sandy',
                'season' => 'Summer',
                'water_availability' => 'High'
            ],
            [
                'crop_name' => 'Barley',
                'region' => 'North',
                'soil_type' => 'Loamy',
                'season' => 'Spring',
                'water_availability' => 'Low'
            ],
            [
                'crop_name' => 'Soybeans',
                'region' => 'South',
                'soil_type' => 'Clayey',
                'season' => 'Summer',
                'water_availability' => 'Moderate'
            ],
            [
                'crop_name' => 'Potatoes',
                'region' => 'West',
                'soil_type' => 'Silty',
                'season' => 'Autumn',
                'water_availability' => 'High'
            ],
            [
                'crop_name' => 'Tomatoes',
                'region' => 'Central',
                'soil_type' => 'Loamy',
                'season' => 'Summer',
                'water_availability' => 'Moderate'
            ],
            [
                'crop_name' => 'Spinach',
                'region' => 'North',
                'soil_type' => 'Sandy',
                'season' => 'Spring',
                'water_availability' => 'Low'
            ],
            [
                'crop_name' => 'Bell Peppers',
                'region' => 'South',
                'soil_type' => 'Loamy',
                'season' => 'Summer',
                'water_availability' => 'High'
            ],
        ]);
    }
}
