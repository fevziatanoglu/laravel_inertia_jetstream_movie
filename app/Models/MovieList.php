<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieList extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'description' , 'isPublic'];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function movies(){
        return $this->belongsToMany(Movie::class,'movie_movie_list','movie_list_id','movie_id')->withTimestamps();
    }
}
