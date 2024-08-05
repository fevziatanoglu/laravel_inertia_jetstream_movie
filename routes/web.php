<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\MovieListController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::get('dashboard', [DashboardController::class , 'index'])->name('dashboard');
// search
Route::get('search', [SearchController::class, 'index'])->name('search')->middleware('auth');
Route::get('search/{query}', [SearchController::class, 'search'])->name('search.movies')->middleware('auth');
// movie
Route::get('movie/{id}', [MovieController::class, 'index'])->name('get.movie');
Route::get('movie/{movie}/comments', [CommentController::class, 'index'])->name('get.comments');
Route::post('movie/{movie}/comments', [CommentController::class, 'store'])->name('add.comment');
Route::delete('comments/{comment}', [CommentController::class, 'delete'])->name('delete.comment');
Route::get('movie/{movie}/actors', [MovieController::class, 'actors'])->name('get.actors');
// profile
Route::get('user/{user}', [UserController::class, 'index'])->name('get.user');
// movie list
Route::get('movielist/form', [MovieListController::class, 'form'])->name('get.movielist.form');
Route::post('create/movielist', [MovieListController::class, 'store'])->name('add.movielist');
Route::get('movielist/{movie_list}', [MovieListController::class, 'index'])->name('get.movielist');
Route::delete('movielist/{movie_list}', [MovieListController::class, 'delete'])->name('delete.movielist');
// movie movie list
Route::post('movielist/{list_id}/movie/{movie_id}', [MovieListController::class, 'addMovieToList'])->name('add.movie.movielist');
Route::delete('movielist/{list}/movie/{movie}', [MovieListController::class, 'deleteMovieFromList'])->name('delete.movie.movielist');
