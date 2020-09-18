@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/post" method="post" enctype="multipart/form-data">

        <div class="row justify-content-center">

            @csrf
            <div class="row">
                <h2>Adding new post</h2>
            </div>
            <div class="col-md-8 offset-2">
                <div class="row">
                    <label for="caption" class="col-md-12 col-form-label">Post caption</label>
                    <input id="caption" type="caption"
                           class="form-control @error('caption') is-invalid @enderror"
                           name="caption" value="{{ old('caption') }}"
                           autocomplete="caption">

                    @error('caption')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row mb-5">
                    <label for="image" class="col-md-12 col-form-label">Post image</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input @error('image') is-invalid @enderror"
                               id="image" name="image"
                               value="{{ old('image') }}"
                               required autocomplete="image">
                        <label class="custom-file-label" for="image">Choose file</label>
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>

                <div class="input-group mt-3">
                    <input class="btn btn-primary" type="submit" value="Publish">
                </div>

            </div>
        </div>
    </form>
</div>
@endsection
