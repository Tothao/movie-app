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
        Schema::table('showtimes', function (Blueprint $table) {
              // Thêm ràng buộc khóa ngoại cho cinema_room_id
              $table->foreign('cinema_room_id')
              ->references('id')->on('cinema_rooms')
              ->onDelete('cascade'); // Thay đổi tùy theo yêu cầu của bạn
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('showtimes', function (Blueprint $table) {
            //
        });
    }
};
