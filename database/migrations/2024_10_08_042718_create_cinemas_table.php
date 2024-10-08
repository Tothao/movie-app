<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cinemas', function (Blueprint $table) {
            $table->id(); // Khóa chính
            $table->string('name'); // Tên rạp
            $table->string('location')->nullable(); // Địa chỉ
            $table->string('city'); // Thành phố
            $table->string('state')->nullable(); // Bang (nếu có)
            $table->string('zip_code')->nullable(); // Mã bưu điện (nếu có)
            $table->string('phone')->nullable(); // Số điện thoại (nếu có)
            $table->timestamps(); // Thời gian tạo và cập nhật
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cinemas');
    }
};
