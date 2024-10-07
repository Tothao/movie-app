<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Hành Động',
                'description' => 'Phim hành động thường bao gồm các cảnh quay mạo hiểm và thể chất cao.'
            ],
            [
                'name' => 'Hài',
                'description' => 'Phim hài nhằm mục đích gây cười cho khán giả.'
            ],
            [
                'name' => 'Tâm Lý',
                'description' => 'Phim tâm lý tập trung vào phát triển nhân vật và cốt truyện cảm xúc.'
            ],
            [
                'name' => 'Kinh Dị',
                'description' => 'Phim kinh dị được thiết kế để làm sợ hãi và bất an khán giả.'
            ],
            [
                'name' => 'Khoa Học Viễn Tưởng',
                'description' => 'Phim khoa học viễn tưởng thường khám phá các khái niệm và công nghệ tương lai.'
            ],
            // Thêm các thể loại khác nếu cần
        ]);
    }
    }

