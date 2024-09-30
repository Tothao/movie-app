<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('directors', function (Blueprint $table) {
            $table->id();               // Tự động tạo khóa chính
            $table->string("name");      // Tên đạo diễn
            $table->integer("age");      // Tuổi (nên dùng integer)
            $table->timestamps();        // Tự động tạo cột created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('directors'); // Xóa bảng directors nếu tồn tại
    }
};
