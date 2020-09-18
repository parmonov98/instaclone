<?php

namespace App\Http\Controllers;

use App\Posts;
use App\User;
//use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Gate;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = auth()->user()->following()->pluck('pages.user_id');
//        $posts = Posts::whereIn('user_id', $users)->orderBy('created_at', 'DESC')->get();
        $posts = Posts::whereIn('user_id', $users)->latest()->paginate(2);
//        ddd($users);
//        ddd($posts);
        return view('posts.index', compact('posts'));

    }

    public function show(\App\Posts $post){

//        dd($post);
        return view('posts.show', compact('post'));
    }

    //create method
    public function create(){
        return view('posts.create');
    }

    //delete method
    public function delete($post){
//        dd($post);
        $user = Auth::user();
        $post = \App\Posts::findOrFail($post);
        if (Gate::allows('delete', $post)){
//            $res=Posts::where('id', $post)->delete();

            if ($post->delete()){
                return redirect('/page/' . $user->page->id);
            }else{
                abort( response('Unavailable post or something went wrong!', 401) );
            }

        }else{
            abort(419, 'UnAuthorized action' );
        }


    }

    public function store(Request $request){
//        dd($request->all());
        $data = $request->validate([
            'caption' => 'required',
            'image' => ['required', 'image']
        ]);

        $path = Storage::disk('public')->put('uploads', $request->file('image'));

        $image = Image::make(public_path("storage/{$path}"))->fit(1200, 1200);

//        $image = Image::make(public_path("storage/{$path}"))->fit(1200, 1200);
        $image->save();

//        \App\Posts::create($data);
//        dd($path);
//        dd(\App\Posts::create());
        auth()->user()->posts()->create([
            'image' => $path,
            'caption'=> $data['caption']
        ]);

//        dd($data);
        return redirect('/home');

    }
}
