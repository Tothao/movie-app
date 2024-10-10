<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShowtimesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('showtimes')->insert([
            [
                'movie_id' => 1, // ID của phim
                'cinema_room_id' => 1, // ID của phòng chiếu
                'show_date' => '2024-10-15',
                'show_time' => '14:00:00',
                'ticket_price' => 100000,
            ],
            [
                'movie_id' => 1,
                'cinema_room_id' => 1,
                'show_date' => '2024-10-15',
                'show_time' => '17:00:00',
                'ticket_price' => 100000,
            ],
            [
                'movie_id' => 2,
                'cinema_room_id' => 2,
                'show_date' => '2024-10-16',
                'show_time' => '19:30:00',
                'ticket_price' => 120000,
            ],
            [
                'movie_id' => 3,
                'cinema_room_id' => 3,
                'show_date' => '2024-10-17',
                'show_time' => '20:00:00',
                'ticket_price' => 150000,
            ],
            // Thêm nhiều dữ liệu mẫu hơn nếu cần
        ]);
    }
}
