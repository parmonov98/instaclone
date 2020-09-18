@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($posts as $post)
            <div class="row mb-3">
                <div class="col-8 mx-auto">
                    <p class="mb-0">
                        <a href="/page/{{$post->user->id}}">
                            <strong>
                                {{$post->user->username}}
                            </strong>
                        </a>
                        wrote:
                        {{ $post->caption }}</p>

                    <a href="/post/{{$post->id}}">
                        <img src="/storage/{{$post->image}}" class="w-100">
                    </a>

                </div>
            </div>
        @endforeach
        <div class="row justify-content-center">
            <div class="col-8 ">
                {{ $posts->links() }}
            </div>
        </div>

    </div>
@endsection
