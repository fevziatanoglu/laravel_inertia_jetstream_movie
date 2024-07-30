<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Movie;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CommentController extends Controller
{


    public function index(Movie $movie)
    {
        $comments = $movie->comments;
        return Inertia::render('MovieComments', [
            'comments' => $comments,
            'movie' => $movie
        ]);
    }

    public function store(Request $request, Movie $movie)
    {
        $validatedData = $request->validate([
            'content' => 'required|string',
            'score' => 'required|integer|min:0|max:5',
        ]);

        $user_id = auth()->user()->id;
        $movie_id = $movie->id;

        $validatedData['user_id'] = $user_id;
        $validatedData['commentable_id'] = $movie_id;
        $validatedData['commentable_type'] = Movie::class;
        $validatedData['user_name'] = auth()->user()->name;
        $validatedData['movie_name'] = $movie->title;


        $comment = Comment::query()->updateOrCreate(['user_id' => $user_id, 'commentable_id' => $movie_id], $validatedData);
        // $movie->comments()->save($comment);
        // return response()->json($comment);
    }

    public function delete(Comment $comment)
    {
        $comment->delete();
    }
}
