<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\MovieList;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{

    public function index(){

        // feed list
        $comments = Comment::all()->toArray();
        $lists = MovieList::all()->toArray();

        // $posts = [
        //     'type' => 
        //     'resource' =>
        //     'created_at' => 
        // ]

        // $posts = array_merge($comments , $lists);

        // usort($posts, function ($a, $b) {
        //     return strtotime($a['created_at']) - strtotime($b['created_at']);
        // });
        
        return Inertia::render('Dashboard' , [
            'comments' => $comments,
            'lists' => $lists,
        ]);
    }

}
