<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'release_date',
        'category_id'

    ];
    public function directors()
    {
        return $this->belongsToMany(Director::class, 'movies_director');
    }

    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'actor_movie');
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'genre_movie');
    }
    
}
