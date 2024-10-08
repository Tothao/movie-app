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
                
                'release_date' => '2010-07-16',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Dark Knight',
                'description' => 'When the menace known as the Joker emerges from his mysterious past, he wreaks havoc and chaos on the people of Gotham.',
                'release_date' => '2008-07-18',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Interstellar',
                'description' => 'A team of explorers travel through a wormhole in space in an attempt to ensure humanity\'s survival.',
                'release_date' => '2014-11-07',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
