@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row mt-4">
        @foreach($users as $index => $user)
            @if (!empty($user->post))
                <div class="card col-sm-12 col-md-12 col-lg-8 mx-auto mb-3 feed_item">

                    <div class="card-header d-flex align-items-center bg-transparent">
                        @php $check = isset($user->image)  @endphp
                        <div class="mr-2" style="max-width: 32px;">
                            @if ($check)
                                <img class="rounded-circle w-100" src="/storage/{{$user->image ?? 'uploads/imgs/default-avatar.jpg'}}">
                            @else
                                <img class="rounded-circle w-100" src="/storage/{{$user->page->image ?? 'uploads/imgs/default-avatar.jpg'}}">
                            @endif

                        </div>

                        <a class="mr-2" title="{{$user->description ?? $user->page->description}} from {{$user->url ?? $user->page->url}}" href="/page/{{$user->user_id ?? $user->id}}">
                            {{$user->title ?? $user->page->title}}
                        </a>
                        posted a DP(DevPage)
                    </div>
                    <div class="card-body">
                        <img class="w-100" src="/storage/{{$user->post->image ?? 'uploads/imgs/default-avatar.jpg'}}">
                        <div class="feed_caption">
                            {{$user->post->caption}}
                        </div>
                    </div>


                </div>
            @else
            <div class="card col-sm-12 col-md-12 col-lg-8 mx-auto mb-3 feed_item">

                <div class="card-header d-flex align-items-center bg-transparent">
                    Check out what
                    <div class="mx-2" style="max-width: 32px;">
                        <img class="rounded-circle w-100" src="/storage/{{$user->image ?? 'uploads/imgs/default-avatar.jpg'}}">
                    </div>

                    <a class="mr-2" title="{{$user->description}}
                        from {{$user->url}}" href="/page/{{$user->user_id ?? $user->id}}">
                        {{$user->name ?? $user->title}}
                    </a>
                    is doing...
                </div>

            </div>
            @endif


        @endforeach
    </div>
</div>
@endsection
