<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CinemaRoom;
class CinemaRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CinemaRoom::create([
            'cinema_id' => 1, // ID của rạp chiếu, hãy đảm bảo rạp này tồn tại
            'room_name' => 'Phòng Chiếu 1',
            'capacity' => 100,
        ]);

        CinemaRoom::create([
            'cinema_id' => 1,
            'room_name' => 'Phòng Chiếu 2',
            'capacity' => 150,
        ]);

        CinemaRoom::create([
            'cinema_id' => 2, // ID của rạp chiếu khác
            'room_name' => 'Phòng Chiếu 1',
            'capacity' => 200,
        ]);

        CinemaRoom::create([
            'cinema_id' => 2,
            'room_name' => 'Phòng Chiếu 2',
            'capacity' => 250,
        ]);
    }
}
