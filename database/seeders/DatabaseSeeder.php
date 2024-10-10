<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(MoviesTableSeeder::class);
        // \App\Models\User::factory(10)->create();
        $this->call(ActorsTableSeeder::class);
        //   \App\Models\User::factory()->create([
        //     public function run()
        $this->call(DirectorSeeder::class);
    
        $this->call(GenreSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(CinemaSeeder::class);
        $this->call(CinemaRoomSeeder::class);
        //     'email' => 'test@example.com',
        // ]);
    }
}
