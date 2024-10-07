<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveDirectorAndGenreFromMoviesTable extends Migration
{
    public function up()
    {
        Schema::table('movies', function (Blueprint $table) {
            // Xóa cột 'director' và 'genre' nếu tồn tại
            $table->dropColumn('director');
            $table->dropColumn('genre');
        });
    }

    public function down()
    {
        Schema::table('movies', function (Blueprint $table) {
            // Thêm lại cột 'director' và 'genre' nếu cần khôi phục
            $table->string('director')->nullable();
            $table->string('genre')->nullable();
        });
    }
}

