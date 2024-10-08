<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DirectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('directors')->insert([
            [
                'name' => 'Christopher Nolan',
                'age' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Steven Spielberg',
                'age' => 74,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Martin Scorsese',
                'age' => 78,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

    }
}
