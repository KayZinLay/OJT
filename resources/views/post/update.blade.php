@extends('layouts.hearder_menu')
@extends('layouts.footer')

<!-- css -->
<link href="{{ asset('css/list.css') }}" rel="stylesheet">

<form method="POST" action="{{ route('post#updateconfirm', $post->id) }}">
    <div class="container">
        <h5 class="title">Post Update</h5>
                @csrf
                
                <div class="form-group row">
                    <label class="col-sm-4">
                        Title
                    </label>
                    <input type="text" class="col-sm-6 form-control @error('name') is-invalid @enderror" name="title"
                        id="title" value="{{ old('title', $post->title) }}">
                    @error('title')
                    <span class="col-sm-4"></span>
                    <span class="invalid-feedback col-sm-6" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">
                        Description
                    </label>
                    <input type="textarea" class="col-sm-6 form-control @error('description') is-invalid @enderror" name="description"
                        id="description" value="{{ old('description', $post->description) }}">
                    @error('description')
                    <span class="col-sm-4"></span>
                    <span class="invalid-feedback col-sm-6" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-primary ml-2">Confrim</button>
                    <button type="button" class="btn btn-outline-success"
                        onclick="location.reload();">Clear</button>
                </div>
    </div>
</form>