@extends('layouts.hearder_menu')
@extends('layouts.footer')

<!-- css -->
<link href="{{ asset('css/list.css') }}" rel="stylesheet">

<form method="POST" action="{{ route('post#update' ,[$post->id ,$post->title, $post->description]) }}" enctype='multipart/form-data'>
    <div class="container">
        <h5 class="title">Update Post Confirmation</h5>
        @csrf
                <div class="form-group row">
                    <label class="col-sm-4">
                        Title
                    </label>
                    <span class="col-sm-5">{{ $post->title }}</span>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">
                        Description
                    </label>
                    <span class="col-sm-5">{{ $post->description }}</span> 
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-primary ml-2">Update</button>
                    <a href="{{url()->previous()}}" class="btn btn-outline-primary ml-2">Cancel</a>
                </div>
    </div>
</form>