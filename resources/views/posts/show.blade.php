@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <img src="/storage/{{$post->image}}" class="w-100">
            </div>
            <div class="col-4">
                <div class="d-flex">
                    <div class="image" style="max-width: 48px;">
                        <img class="rounded-circle w-100"
                             src="{{$post->user->page->image}}"
                             alt="{{$post->user->page->name}}">
                    </div>
                    <div class="details d-flex flex-column ml-3 justify-content-center">
                        <a href="/page/{{$post->user->id}}" class="font-weight-bold username">{{$post->user->username}}</a>
                        <span href="#" class="title" style="line-height: 12px">{{$post->user->page->title}}</span>
                    </div>

                    <a class="d-inline-flex justify-content-center align-items-center ml-3 font-weight-bold h5" href="/follow/{{$post->user->id}}"
                       class="follow_btn">
                        Follow
                    </a>


                </div>

                <hr/>
                <p>
                    <strong>
                        {{$post->user->username}}
                    </strong>
                    wrote:
                    {{ $post->caption }}</p>
            </div>
        </div>

        <div class="row mt-4">
            @foreach($post->user->posts as $post)
                <div class="col-4 mb-4">
                    <a href="/post/{{ $post->id }}">
                        <img class="w-100" src="/storage/{{$post->image}}">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
