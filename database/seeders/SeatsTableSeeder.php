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
        $cinemaRoomIds = [1, 2, 3]; // Danh sách ID của các phòng chiếu

foreach ($cinemaRoomIds as $cinemaRoomId) {
    for ($row = 'A'; $row <= 'E'; $row++) { // Từ A đến E cho đủ 50 ghế
        for ($col = 1; $col <= 10; $col++) { // 10 cột mỗi hàng
            $seatNumber = $row . $col;
            $type = ($row == 'A' || $row == 'B') ? 'vip' : 'thuong'; // Hàng A và B là VIP, còn lại là thường
            
            DB::table('seats')->insert([
                'cinema_room_id' => $cinemaRoomId, // Sử dụng ID của phòng chiếu hiện tại
                'seat_number' => $seatNumber,
                'row' => $row,
                'column' => $col,
                'type' => $type,
                'is_available' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
}
}