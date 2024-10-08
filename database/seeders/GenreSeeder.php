<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('genres')->insert([
            ['name' => 'Hành động'],
            ['name' => 'Hài'],
            ['name' => 'Kịch'],
            ['name' => 'Kinh dị'],
            ['name' => 'Khoa học viễn tưởng'],
            ['name' => 'Huyền bí'],
            ['name' => 'Tình cảm'],
            ['name' => 'Giật gân'],
            ['name' => 'Tài liệu'],
            ['name' => 'Hoạt hình'],
        ]);
    }
}
