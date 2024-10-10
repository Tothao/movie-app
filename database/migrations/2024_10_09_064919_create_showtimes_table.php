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
        Schema::create('showtimes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('movie_id'); // Khóa ngoại liên kết với bảng movies
            $table->unsignedBigInteger('cinema_room_id'); // Khóa ngoại liên kết với bảng cinema_rooms
            $table->date('show_date'); // Ngày chiếu
            $table->time('show_time'); // Giờ chiếu
            $table->decimal('ticket_price', 8, 2); // Giá vé
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('showtimes');
    }
};
