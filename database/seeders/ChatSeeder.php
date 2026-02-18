<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $chats = [
            [
                'message' => 'Probleem is niet verholpen please hellup mij!',
                'ticket_id' => 1,
                'user_id' => 1,
            ],
            [
                'message' => 'Waarom werkt het niet?',
                'ticket_id' => 2,
                'user_id' => 2,
            ],
            [
                'message' => 'Hellup',
                'ticket_id' => 3,
                'user_id' => 3,
            ]
        ];
        DB::table('chats')->insert($chats);
    }
}
