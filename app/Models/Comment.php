<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'content',
        'user_id',
        'score',
        'user_name',
        'movie_name',
        'commentable_type',
        'commentable_id'
    ];

    public static function createComment(Request $request)
    {
        try {
            $request = $request->validate([
                'content' => 'required|string',
                'score' => 'required|integer|min:0|max:5',
                'movie_id' => 'required|integer'
            ]);

            $request['user_id'] = auth()->user()->id;
            $request['commentable_type'] = Movie::class;
            $request['commentable_id'] = $request['movie_id'];

            $movie = Movie::find($request['movie_id']);
            $comment = Comment::create([$request]);
            $movie->comments()->save($comment);

        } catch (\throwable $e) {
            report($e);
            throw new ModelNotFoundException();
        }
    }

    public function commentable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
