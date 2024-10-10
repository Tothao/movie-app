<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Showtime extends Model
{
    use HasFactory;
    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function cinemaRoom()
    {
        return $this->belongsTo(CinemaRoom::class, 'cinema_room_id');
    }
}

