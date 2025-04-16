<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PestAlert;

class PestAlertSeeder extends Seeder
{
    public function run()
    {
        DB::table('pest_alerts')->truncate(); // Optional: clear old data

        $alerts = [
            [
                'location' => 'Northern',
                'crop' => 'Corn',
                'severity' => 'High',
                'description' => 'Significant infestation detected in 5 districts. Larvae found in 60% of surveyed fields.',
            ],
            [
                'location' => 'Southern',
                'crop' => 'Rice',
                'severity' => 'Medium',
                'description' => 'Fungal lesions observed on leaves in 30% of paddies due to humid weather.',
            ],
            [
                'location' => 'Central',
                'crop' => 'Wheat',
                'severity' => 'Critical',
                'description' => 'Heavy aphid attack in 40% of wheat fields. Pesticide application advised.',
            ],
            [
                'location' => 'Eastern',
                'crop' => 'Soybean',
                'severity' => 'Low',
                'description' => 'Mild signs of leaf spot. No urgent intervention required.',
            ],
            [
                'location' => 'Western',
                'crop' => 'Vegetables',
                'severity' => 'High',
                'description' => 'Whiteflies spreading fast among brinjal crops. Regular monitoring recommended.',
            ],
            [
                'location' => 'Northern',
                'crop' => 'Fruits',
                'severity' => 'Medium',
                'description' => 'Fruit borers spotted in apple orchards. Early action can prevent spread.',
            ],
            [
                'location' => 'Southern',
                'crop' => 'Corn',
                'severity' => 'Critical',
                'description' => 'Fall armyworm outbreak detected in southern belt. Emergency measures required.',
            ],
            [
                'location' => 'Central',
                'crop' => 'Vegetables',
                'severity' => 'Critical',
                'description' => 'Widespread whitefly and leaf miner attack on tomatoes and brinjals.',
            ]
        ];

        foreach ($alerts as $alert) {
            PestAlert::create($alert);
        }
    }
}

