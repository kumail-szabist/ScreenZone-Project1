<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Snack;

class SnackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Snack::create([
            'title' => 'Popcorn (Large)',
            'price' => 5.99,
        ]);

        Snack::create([
            'title' => 'Soda (Medium)',
            'price' => 2.50,
        ]);

        Snack::create([
            'title' => 'Nachos',
            'price' => 4.50,
        ]);
    }
}
