<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MoviesTableSeeder extends Seeder
{
    public function run()
    {
        
        DB::table('movies')->insert([
            [
                'title' => 'Inception',
                'description' => 'A skilled thief is given a chance at redemption if he can successfully perform inception.',
                'release_year' => 2010,
                'director' => 'Christopher Nolan',
                'genre' => 'Science Fiction',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Dark Knight',
                'description' => 'When the menace known as the Joker emerges from his mysterious past, he wreaks havoc and chaos on the people of Gotham.',
                'release_year' => 2008,
                'director' => 'Christopher Nolan',
                'genre' => 'Action',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Interstellar',
                'description' => 'A team of explorers travel through a wormhole in space in an attempt to ensure humanity\'s survival.',
                'release_year' => 2014,
                'director' => 'Christopher Nolan',
                'genre' => 'Adventure',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
