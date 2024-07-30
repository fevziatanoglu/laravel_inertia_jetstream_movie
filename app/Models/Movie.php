<?php

namespace App\Models;

use App\Services\TMDBService;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Arr;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'overview',
        'release_date',
        'runtime',
        'backdrop_path',
        'poster_path'
    ];

    // Attributes
    protected function backdropPath(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => config('services.tmdb.img_url') . $value,
        );
    }

    protected function posterPath(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => config('services.tmdb.img_url') . $value,
        );
    }

    public static function getMovieScore(Movie $movie)
    {

        $score = 0;
        $counter = 0;
        foreach ($movie->comments as $comment) {
            $score += $comment->score;
            $counter++;
        }

        return ['avarage' => (int)$score/$counter , 'counter' => $counter];
    }


    public static function findOrFetch($id)
    {
        // check db with id
        $movie = static::query()->findOrNew($id);

        // if movie not in db
        try {
            if (!$movie->exists) {

                // call service 
                $client = new TMDBService();
                // fetch movie from api
                $response = $client->get("/3/movie/{$id}");
                $response = json_decode($response->getBody()->getContents(), true);

                $movie = Movie::create($response);
            }

            // if movie has not actors
            if (!$movie->actors()->exists()) {
                // fetch actors
                $response = $client->get("/3/movie/{$id}/credits");
                $response = json_decode($response->getBody()->getContents(), true)['cast'];
                // take top 5
                $payload = collect($response)
                    ->take(5);

                // take actors' related variables
                $actors = $payload
                    ->map(fn ($member) => Arr::only($member, ['id', 'name', 'profile_path']))
                    ->toArray();

                // create or update 5 actors
                $actors = Actor::query()->upsert($actors, ['id']);

                // create id => character array for pivot save
                $actors = $payload
                    ->mapWithKeys(fn ($actor) => [
                        $actor['id'] => [
                            'character' => $actor['character']
                        ],
                    ])
                    ->toArray();

                // relate actors and movie
                $movie->actors()->sync($actors);
            }
        } catch (\throwable $e) {
            report($e);
            throw new ModelNotFoundException();
        }
        // if movie exists in db , return directly
        return $movie;
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'actor_movie', 'movie_id', 'actor_id')->withPivot('character');
    }

    public function lists()
    {
        return $this->belongsToMany(MovieList::class, 'movie_movie_list', 'movie_id', 'movie_list_id')->withTimestamps();
    }
}
