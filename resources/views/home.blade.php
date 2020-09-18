@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
       <div class="col-3 p-5">
            <img class="rounded-circle w-100"  src="/storage/{{$user->page->image  ?? 'uploads/imgs/default-avatar.jpg'}}" >
       </div>
       <div class="col-md-9 pt-5">
            <h3 class="d-flex align-items-baseline ">
                <strong class="mr-3">{{$user->username}}</strong> | {{$user->id}}
                @auth()
                    <a href="/post/create" class="ml-auto h5">Add Post</a>
                @endauth

            </h3>
           <div>
               @can('update', $page)
                       <a href="/page/{{$user->id}}/edit" class="mr-auto h5">Edit page</a>
               @endcan
           </div>
            <div class="mt-2">
                <strong>{{$user->posts->count()}}</strong> posts
                <strong class="ml-4">{{$user->page->followers->count()}}</strong> followers
                <strong class="ml-4">{{$user->following->count()}}</strong> following
            </div>
            <div class="mt-3">
                <strong>{{$user->page->title}}</strong>
            </div>
            <div>
                {{$user->page->description}}
            </div>
            <div><a href="{{$user->page->url}}">{{$user->page->url ?? 'N/A'}}</a></div>
       </div>
    </div>

    <div class="row mt-4">
        @foreach($user->posts as $post)
            <div class="col-sm-12 col-md-6 col-lg-4 mb-3 post_item">
                <a href="/post/{{ $post->id }}">
                    <img class="w-100" src="/storage/{{$post->image }}">
                </a>
                @can('delete', $post)
                    <a class="delete_post" href="/post/{{$post->id}}/delete">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                        </svg>
                    </a>
                @endcan
            </div>
        @endforeach
    </div>
</div>
@endsection
