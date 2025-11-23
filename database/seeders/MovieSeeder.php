<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movie;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Movie::create([
            'title' => 'Avengers: Endgame',
            'description' => 'After the devastating events of Infinity War, the universe is in ruins.',
            'image' => 'endgame.jpeg',
        ]);

        Movie::create([
            'title' => 'Inception',
            'description' => 'A thief who steals corporate secrets through the use of dream-sharing technology.',
            'image' => 'inception.jpeg',
        ]);

        Movie::create([
            'title' => 'Joker',
            'description' => 'In Gotham City, mentally troubled comedian Arthur Fleck is disregarded and mistreated by society.',
            'image' => 'joker.jpeg',
        ]);
    }
}
