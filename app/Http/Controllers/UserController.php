<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    
    public function index(User $user){

        $lists = $user->lists->map(fn ($list) => $list->loadMissing(['movies']))
        ->toArray();
        return Inertia::render('UserProfile' , [
            'user' => $user,
            'lists' => $lists,
            'comments' => $user->comments
        ]);
    }
}
