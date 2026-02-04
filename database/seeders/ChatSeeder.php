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
                'ticket' => 1,
                'user' => 1,
            ],
            [
                'message' => 'Waarom werkt het niet?',
                'ticket' => 2,
                'user' => 2,
            ],
            [
                'message' => 'Hellup',
                'ticket' => 3,
                'user' => 3,
            ]
        ];
        DB::table('chats')->insert($chats);
    }
}
