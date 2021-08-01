@extends('layouts.hearder_menu')
@extends('layouts.footer')

<!-- css -->
<link href="{{ asset('css/list.css') }}" rel="stylesheet">

<form method="GET" action="{{route('user#edit',$user->id)}}">
    <div class="container">
        <h5 class="title">User Profile<h3>
            <div class="form-group row">
            <label class="col-sm-4">
                </label>
                <button type="submit" class="btn btn-outline-primary" class="col-sm-4">Edit</button>
            </div>
            <div class="form-group row">
                <label class="col-sm-4">
                    Name
                </label>
                <span class="col-sm-5">{{ $user->name }}</span>
            </div>
            <div class="form-group row">
            <label class="col-sm-4"></label>
            <span class="col-sm-5"><img src="{{ asset('storage/image/'.$user->profile) }}" alt="" title="" height="100" width="100" class="col-sm-5"></img></span>
            </div>
            <div class="form-group row">
                <label class="col-sm-4">
                    Email Address
                </label>
                <span class="col-sm-5">{{ $user->email }}</span>
            </div>
            <div class="form-group row">
                <label class="col-sm-4">
                    Type
                </label>
                <span class="col-sm-5">{{ config('constants.ROLES')[$user->type] }}</span>
            </div>
            <div class="form-group row">
                <label class="col-sm-4">
                    Phone
                </label>
                <span class="col-sm-5">{{ $user->phone }}</span>
            </div>
            <div class="form-group row">
                <label class="col-sm-4">
                    >Date of Birth
                </label>
                <span class="col-sm-5">{{ $user->dob }}</span>
            </div>
            <div class="form-group row">
                <label class="col-sm-4">
                    Address
                </label>
                <span class="col-sm-5">{{ $user->address }}</span>
            </div>
            
    </div>
</form>