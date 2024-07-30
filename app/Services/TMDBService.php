<?php

namespace App\Services;

use App\Models\Movie;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

 class TMDBService extends Client
{

    public function __construct()
    {
          parent::__construct([
            'base_uri' => config('services.tmdb.host'),
            'headers' => [
                'Authorization' => 'Bearer ' . config('services.tmdb.header'),
                'accept' => 'application/json',
            ],
        ]);
    }

}