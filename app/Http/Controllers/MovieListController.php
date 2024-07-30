<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\MovieList;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MovieListController extends Controller
{
    public function index(MovieList $movie_list)
    {

        $movies = $movie_list->movies;
        return Inertia::render('MovieList', [
            'movieList' => $movie_list,
            'movies' => $movies
        ]);
    }

    public function form()
    {
        return Inertia::render('MovieListForm');
    }

    public function store(Request $request)
    {
        $request = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        // if ($request()->fails()) {
        //     return redirect()->back()
        //         ->withErrors($request)
        //         ->withInput();
        // }

        $request['user_id'] = auth()->user()->id;

        $movie_list = MovieList::create($request);

        return Inertia::render('MovieList', [
            'movieList' => $movie_list,
            'movies' => []
        ]);
    }

    public function delete(MovieList $movie_list)
    {
        $movie_list->delete();
    }


    // MOVIE
    function addMovieToList(Request $request)
    {
        $movie_id = $request->input('movie_id');
        $list_id = $request->input('list_id');
        $movie = Movie::findOrFetch($movie_id);
        $list = MovieList::find($list_id);
        $list->movies()->attach($movie);
    }

    function deleteMovieFromList(MovieList $list, Movie $movie)
    {
        $list->movies()->detach($movie);
    }
}
