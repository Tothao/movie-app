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
        {
            DB::table('genres')->insert([
                ['name' => 'Hành động', 'description' => 'Phim có tiết tấu nhanh và nhiều cảnh hành động.'],
                ['name' => 'Hài', 'description' => 'Phim mang tính giải trí, hài hước và nhẹ nhàng.'],
                ['name' => 'Tâm lý', 'description' => 'Phim có cốt truyện sâu sắc, tập trung vào tâm lý nhân vật.'],
                ['name' => 'Kinh dị', 'description' => 'Phim đáng sợ và thiết kế để gây sợ hãi cho người xem.'],
                ['name' => 'Lãng mạn', 'description' => 'Phim tập trung vào tình yêu và mối quan hệ lãng mạn.'],
                ['name' => 'Khoa học viễn tưởng', 'description' => 'Phim về tương lai, khoa học và công nghệ tiên tiến.'],
                ['name' => 'Thần thoại', 'description' => 'Phim có yếu tố phép thuật và hiện tượng siêu nhiên.'],
            ]);
        }
    }
}
