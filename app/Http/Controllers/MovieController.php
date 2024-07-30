<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Services\TMDBService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MovieController extends Controller
{
    protected $tmdbService;

    public function __construct(TMDBService $tmdbService)
    {
        $this->tmdbService = $tmdbService;
    }



    function index($id)
    {
        $movie = Movie::findOrFetch($id);
        return Inertia::render(
            'Movie',
            [
                'movie' => $movie,
            ]
        );
    }

    function actors(Movie $movie)
    {
        $movie->loadMissing(['actors']);
        $actors = $movie->actors;
        return Inertia::render(
            'MovieActors',
            [
                'movie' => $movie,
                'actors' => $actors,
            ]
        );
    }
}
