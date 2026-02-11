<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tickets = [
            [
                'subject' => 'Login Issue',
                'description' => 'Unable to login with correct credentials.',
                'status_id' => 1,
                'priority_id' => 1,
                'category_id' => 1,
                'location_id' => 2,
                'user_id' => 13,
            ],
            [
                'subject' => 'Page Not Loading',
                'description' => 'The dashboard page is not loading properly.',
                'status_id' => 2,
                'priority_id' => 3,
                'category_id' => 2,
                'location_id' => 2,
                'user_id' => 1,
            ],
            [
                'subject' => 'Feature Request',
                'description' => 'Requesting a new feature for reporting.',
                'status_id' => 3,
                'priority_id' => 4,
                'category_id' => 3,
                'location_id' => 1,
                'user_id' => 2,
            ],
        ];
        DB::table('tickets')->insert($tickets);
    }
}
