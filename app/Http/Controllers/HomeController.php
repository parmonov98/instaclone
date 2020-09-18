<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

//        $user = \App\User::findOrFail();
//        $user = \App\User::with(['page'  => function ($query) {
//            $query->where
//        }])->get();
        $user = Auth::user();
//        ddd($user);
        $page = $user->page;
        return view('home', compact('user', 'page'));
    }
}
