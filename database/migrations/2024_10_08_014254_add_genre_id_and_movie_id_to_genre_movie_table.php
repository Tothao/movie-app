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
        Schema::table('genre_movie', function (Blueprint $table) {
            $table->unsignedBigInteger('genre_id')->after('id'); // Hoặc vị trí bạn muốn
            $table->unsignedBigInteger('movie_id')->after('genre_id'); // Hoặc vị trí bạn muốn

            $table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade');
            $table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('genre_movie', function (Blueprint $table) {
            $table->dropForeign(['genre_id']);
            $table->dropForeign(['movie_id']);
            $table->dropColumn(['genre_id', 'movie_id']);
        });
    }
};
