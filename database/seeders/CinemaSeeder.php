<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CinemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cinemas')->insert([
            ['id' => 1, 'name' => 'CGV Vincom B', 'location' => 'Vincom Center, 171 Đ. Đê La Thành', 'city' => 'Hà Nội', 'state' => 'Hà Nội', 'zip_code' => '100000', 'phone' => '024 1234 5678'],
            ['id' => 2, 'name' => 'Lotte Cinema', 'location' => '54 Đ. Nguyễn Văn Lộc', 'city' => 'Hồ Chí Minh', 'state' => 'Hồ Chí Minh', 'zip_code' => '700000', 'phone' => '028 8765 4321'],
            ['id' => 3, 'name' => 'BHD Star Cineplex', 'location' => '240 Đ. Đinh Tiên Hoàng', 'city' => 'Bình Dương', 'state' => 'Bình Dương', 'zip_code' => '750000', 'phone' => '0274 1234 567'],
            ['id' => 4, 'name' => 'Galaxy Cinema', 'location' => '123 Đ. Trần Hưng Đạo', 'city' => 'Đà Nẵng', 'state' => 'Đà Nẵng', 'zip_code' => '550000', 'phone' => '0236 7654 321'],
            ['id' => 5, 'name' => 'CineStar', 'location' => '85 Đ. Lê Lợi', 'city' => 'Nha Trang', 'state' => 'Khánh Hòa', 'zip_code' => '650000', 'phone' => '0258 4321 678'],
        ]);
    }
}
