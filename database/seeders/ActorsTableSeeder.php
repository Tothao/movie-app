<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ActorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('actors')->insert([
            [
                'name' => 'Leonardo DiCaprio',
                'birthdate' => '1974-11-11',
                'gender' => 'Male',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Meryl Streep',
                'birthdate' => '1949-06-22',
                'gender' => 'Female',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Denzel Washington',
                'birthdate' => '1954-12-28',
                'gender' => 'Male',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Scarlett Johansson',
                'birthdate' => '1984-11-22',
                'gender' => 'Female',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Morgan Freeman',
                'birthdate' => '1937-06-01',
                'gender' => 'Male',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
