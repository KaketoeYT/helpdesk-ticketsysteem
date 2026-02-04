<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketAssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $assignments = [
            [
                'ticket_id' => 1,
                'user_id' => 2,
            ],
            [
                'ticket_id' => 2,
                'user_id' => 3,
            ],
            [
                'ticket_id' => 3,
                'user_id' => 4,
            ],
        ];
        DB::table('ticket_assignments')->insert($assignments);
    }
}
