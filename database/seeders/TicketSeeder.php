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
                'status' => 'open',
                'priority' => 'high',
                'category_id' => 1,
            ],
            [
                'subject' => 'Page Not Loading',
                'description' => 'The dashboard page is not loading properly.',
                'status' => 'in_progress',
                'priority' => 'medium',
                'category_id' => 2,
            ],
            [
                'subject' => 'Feature Request',
                'description' => 'Requesting a new feature for reporting.',
                'status' => 'closed',
                'priority' => 'low',
                'category_id' => 3,
            ],
        ];
        DB::table('tickets')->insert($tickets);
    }
}
