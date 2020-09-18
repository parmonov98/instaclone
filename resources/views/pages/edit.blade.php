@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/page/{{$user->id}}" method="post" enctype="multipart/form-data">
            @method('patch')
            <div class="row justify-content-center">

                @csrf
                <div class="row">
                    <div class="col-12">
                        <h2>Edit profile page #{{\Illuminate\Support\Facades\Auth::id()}}</h2>
                    </div>
                </div>
                <div class="row col-12">
                    <div class="col-md-8 offset-2">
                        <div class="row">
                            <label for="title" class="col-md-12 col-form-label">Title</label>
                            <input id="title" type="title"
                                   class="form-control @error('title') is-invalid @enderror"
                                   name="title" value="{{ old('title') ?? $user->page->title  }}"
                                   autocomplete="title">

                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="row">
                            <label for="description" class="col-md-12 col-form-label">Description</label>
                            <input id="description" type="description"
                                   class="form-control @error('description') is-invalid @enderror"
                                   name="description" value="{{ old('description') ?? $user->page->description .''  }}"
                                   autocomplete="description">

                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="row">
                            <label for="url" class="col-md-12 col-form-label">URL</label>
                            <input id="url" type="url"
                                   class="form-control @error('url') is-invalid @enderror"
                                   name="url" value="{{ old('url') ?? $user->page->url }}"
                                   autocomplete="url">

                            @error('url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="row mb-5">
                            <label for="image" class="col-md-12 col-form-label">Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('image') is-invalid @enderror"
                                       id="image" name="image"
                                       value="{{ old('image') }}"
                                       autocomplete="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>
                        <div class="row mt-3">
                            <input class="btn btn-primary" type="submit" value="Save Page">
                        </div>
                    </div>
                </div>
        </form>
    </div>
@endsection
