<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(User $user){
//        dd($user);
//        return $user;
//        $user = Auth::user();

        return auth()->user()->following()->toggle($user->page);

//        $user = \App\User::findOrFail($user);
//        return $user->username;
    }
}
