<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CinemaRoom extends Model
{
    use HasFactory;

     protected $fillable = ['cinema_id', 'room_name', 'capacity'];

    public function cinema()
     {
       return $this->belongsTo(Cinema::class);
     }
     public function seats()
    {
        return $this->hasMany(Seat::class);
    }

    public function showtimes()
    {
        return $this->hasMany(Showtime::class, 'cinema_room_id');
    }
    
}
