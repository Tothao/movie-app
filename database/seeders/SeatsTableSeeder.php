<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SeatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cinemaRoomId = 1; // Thay đổi theo ID phòng chiếu bạn muốn

        // Thêm dữ liệu cho ghế
        DB::table('seats')->insert([
            [
                'cinema_room_id' => $cinemaRoomId,
                'seat_number' => 'A1',
                'row' => 'A',
                'column' => 1,
                'type' => 'thuong', // Hoặc 'vip'
            ],
            [
                'cinema_room_id' => $cinemaRoomId,
                'seat_number' => 'A2',
                'row' => 'A',
                'column' => 2,
                'type' => 'thuong',
            ],
            [
                'cinema_room_id' => $cinemaRoomId,
                'seat_number' => 'B1',
                'row' => 'B',
                'column' => 1,
                'type' => 'vip',
            ],
            [
                'cinema_room_id' => $cinemaRoomId,
                'seat_number' => 'B2',
                'row' => 'B',
                'column' => 2,
                'type' => 'vip',
            ],
            [
                'cinema_room_id' => $cinemaRoomId,
                'seat_number' => 'C1',
                'row' => 'C',
                'column' => 1,
                'type' => 'thuong',
            ],
            // Thêm nhiều ghế hơn nếu cần
        ]);
    }
}
