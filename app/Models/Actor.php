<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'name',
        'profile_path'
    ];

    protected function profilePath(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => config('services.tmdb.img_url') . $value,
        );
    }


    public function movies(){
        return $this->belongsToMany(Movie::class, 'actor_movie', 'actor_id', 'movie_id')->withPivot('character');
    }
}
