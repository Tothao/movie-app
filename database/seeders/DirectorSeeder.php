<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Director;

class DirectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $directors = [
            ['name' => 'Christopher Nolan', 'gender' => 'male'],
            ['name' => 'Quentin Tarantino', 'gender' => 'male'],
            ['name' => 'Sofia Coppola', 'gender' => 'female'],
            ['name' => 'Kathryn Bigelow', 'gender' => 'female'],
            ['name' => 'Steven Spielberg', 'gender' => 'male'],
        ];

        foreach ($directors as $director) {
            Director::create($director);
        }
    }
}
