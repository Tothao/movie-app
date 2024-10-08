<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Tạo bảng tạm với thứ tự cột mới
        Schema::create('categories_temp', function (Blueprint $table) {
            $table->id(); // Cột id
            $table->string('name'); // Cột name
            $table->text('description')->nullable(); // Cột description
            $table->timestamps(); // created_at và updated_at
        });

        // Sao chép dữ liệu từ bảng cũ sang bảng tạm
        DB::table('categories')->orderBy('id')->chunk(100, function ($categories) {
            foreach ($categories as $category) {
                DB::table('categories_temp')->insert([
                    'id' => $category->id,
                    'name' => $category->name,
                    'description' => $category->description,
                    'created_at' => $category->created_at,
                    'updated_at' => $category->updated_at,
                ]);
            }
        });

        // Xóa bảng cũ
        Schema::dropIfExists('categories');

        // Đổi tên bảng tạm thành bảng gốc
        Schema::rename('categories_temp', 'categories');
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            //
        });
    }
};
