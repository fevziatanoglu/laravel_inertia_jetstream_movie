<?php

namespace App\Http\Controllers;

use App\Services\TMDBService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SearchController extends Controller
{
    protected $tmdbService;

    public function __construct(TMDBService $tmdbService)
    {
        $this->tmdbService = $tmdbService;
    }

    function index()
    {
        return Inertia::render('Search', []);
    }

    function search($query)
    {
        $response = $this->tmdbService->get('search/movie', [
            'query' => ['query' => $query],
        ]);
        $response = json_decode($response->getBody()->getContents(), true)["results"];
        return response()->json(['movies' => $response]);
    }
}
