@extends('layouts.hearder_menu')
@extends('layouts.footer')

<!-- css -->
<link href="{{ asset('css/list.css') }}" rel="stylesheet">

<form method="POST" action="{{ route('post#postconfrim') }}" id="postRegisterForm">
    <div class="container">
        <h5 class="title">Create Post</h5>
            
            @csrf
                <div class="form-group row">
                    <label for="title" class="col-sm-4">
                        Title
                    </label>
                    <input id="title" type="text" class="col-sm-6 form-control @error('title') is-invalid @enderror"
                        name="title" value="{{ old('title') }}"><span class="text-danger ml-2">*</span>

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
                    <textarea class="form-control col-sm-6" name="description" id="description" rows="10">{{ old('description') }}</textarea>
                    <span class="text-red ml-2">*</span>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-primary ml-2">Confrim</button>
                    <button type="button" class="btn btn-outline-success"
                        onclick="location.reload();">Clear</button>
                </div> 
            
    </div>
</form>