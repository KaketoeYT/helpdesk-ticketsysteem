<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = [
            [
                'name' => 'Het Keukentje',
                'country' => 'Nederland',
                'city' => 'Haarlem',
                'street' => 'Zijlweg',
                'street_number' => '12',
            ],
            [
                'name' => 'De Grote Zandloper',
                'country' => 'Nederland',
                'city' => 'Ijmuiden',
                'street' => 'TijdStraat',
                'street_number' => '233B',
            ]
        ];
        DB::table('locations')->insert($locations);
    }
}
