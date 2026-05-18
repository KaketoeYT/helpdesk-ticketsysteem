<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $commissions = [
            [
                'title' => 'Logo Design',
                'description' => 'Design a modern and creative logo for our new brand.',
                'budget' => 500.00,
                'deadline' => '2024-07-31',
                'category_id' => 1,
            ],
            [
                'title' => 'Website Development',
                'description' => 'Develop a responsive e-commerce website with a user-friendly interface.',
                'budget' => 2000.00,
                'deadline' => '2024-08-15',
                'category_id' => 2,
            ],
            [
                'title' => 'Social Media Marketing',
                'description' => 'Create and manage social media campaigns to increase brand awareness.',
                'budget' => 800.00,
                'deadline' => '2024-09-30',
                'category_id' => 3,
            ],
        ];
    }
}
