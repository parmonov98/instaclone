<?php

namespace App\Http\Controllers;

use App\Page;
use App\Posts;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

//use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    //
    public function index()
    {


        if (Auth::check()) {
            $auth = Auth::user();
            $users = auth()->user()->following()->simplePaginate(1);
            $users->each(function ($user){
                $user->post = Posts::where('user_id', $user->id)->first();

                // ddd($user->post);
           });
        }else{

            // dump(1); die;

            $users = User::with('posts')->simplePaginate(2);

            $users->each(function ($user){
                $user->post = $user->posts->first();

                // ddd($user);
                // ddd($user->post);
            });
            // ddd($users);
        }

        // ddd($users);


    //    ddd($users);
        // $page = $user->page;
        // $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
//        ddd($follows);
        return view('pages.index', compact('users'));
    }
    //
    public function show($user)
    {

        $user = \App\User::findOrFail($user);
//        ddd($user, $user->page);

//        dd($user->page()->title());
//        dd($user_id);
//        dd(User::find($user_id));
//        $user = User::findOrFail($user_id);
        $page = $user->page;
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
//        ddd($follows);
        return view('pages.show', compact('user', 'page', 'follows'));
    }

    public function edit($user){
//        dd($user);
//        $user = auth()->user()->page->($user);
        $user = \App\User::findOrFail($user);
//        ddd($user);
        if (Gate::denies('update', $user->page)) {
            abort(401);
        }

//        if ($user->cannot('update', $page)) {
//            abort(404);
//        }

//        if ($user->)
//        $user = Auth::user();

//        $this->authorizeForUser($user, 'update');

        return view('pages.edit', compact('user'));

//        dd($user->page->title);
//        dd($user->posts());

    }

    public function update($user, Request $request){
        $data = $request->validate([
            'title' => 'string',
            'description' => 'string',
            'url' => ['url'],
        ]);

        $user = \App\User::findOrFail($user);
        $page = $user->page;
        //        ddd($user);

        if (Gate::denies('update', $page)) {

            abort(401);
        }
        $data['title'] = $data['title'];
        $data['description'] = $data['description'];
        $data['url'] = $data['url'];

        if (request('image')){
            $path = Storage::disk('public')->put('page', $request->file('image'));

            $image = Image::make(public_path("storage/{$path}"))->fit(300, 300);

            $image->save();
            $imageArray = ['image' => $path];

        }
        auth()->user()->page->update(
          array_merge(
              $data,
              $imageArray ?? []
          )
        );
//        $page->push();
        return redirect('/page/' . $user->id);
    }
}
