<?php

namespace Database\Seeders;

use App\Models\Location;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'user',
            'email' => 'user@user.nl',
            'role' => 'user',
        ]);

        User::factory()->create([
            'name' => 'worker',
            'email' => 'worker@worker.nl',
            'role' => 'worker',
        ]);

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.nl',
            'role' => 'admin',
        ]);

        $this->call([
            CategorySeeder::class,
            TicketSeeder::class,
            ChatSeeder::class,
            TicketAssignmentSeeder::class,
            PrioritySeeder::class,
            StatusSeeder::class,
            LocationSeeder::class,
        ]);
    }
}
