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
                'name'=>'Het Keukentje'
            ],
            [
                'name'=>'De Grote Zandloper'
            ]
        ];
        DB::table('locations')->insert($locations);
    }
}
