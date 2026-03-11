<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            [
                'name' => 'Open',
                'is_default' => true,
                'color' => '#28a745'
            ],
            [
                'name' => 'In behandeling',
                'is_default' => false,
                'color' => '#ffc107'
            ],
            [
                'name' => 'Afgehandeld',
                'is_default' => false,
                'color' => '#dc3545'
            ]
        ];
        DB::table('statuses')->insert($statuses);
    }
}
