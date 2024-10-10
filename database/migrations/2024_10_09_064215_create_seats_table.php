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
        Schema::create('seats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cinema_room_id'); // Khóa ngoại liên kết với bảng cinema_rooms
            $table->string('seat_number'); // Số ghế (ví dụ: A1, B2)
            $table->integer('row'); // Hàng (1, 2, 3...)
            $table->string('column'); // Cột (A, B, C...)
            $table->enum('type', ['thuong', 'vip']); // Loại ghế (thường, vip)
            $table->boolean('is_available')->default(true); // Trạng thái có sẵn
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seats');
    }
};
