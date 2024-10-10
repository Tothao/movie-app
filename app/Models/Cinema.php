<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    use HasFactory;
     protected $fillable = ['name', 'location']; // Thêm các thuộc tính khác nếu cần

     public function rooms()
     {
         return $this->hasMany(CinemaRoom::class);
    }
}
