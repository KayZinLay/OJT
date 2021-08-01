@extends('layouts.hearder_menu')

<!-- css -->
<link href="{{ asset('css/list.css') }}" rel="stylesheet">

<form method="POST" action="{{ route('user#store' ,[$user->name,$user->email,$user->password,$user->type,$user->phone,$user->dob,$user->address,$user->profile]) }}" 
    enctype='multipart/form-data'>
    <div class="container">
        <h5 class="title">Create User Confirmation</h5>
        @csrf
                <div class="form-group row">
                    <label class="col-sm-4">
                        Profile
                    </label>
                    <img src="{{ $user->profile }}" alt="" title="" height="100" width="100"></img>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">
                        Name
                    </label>
                    <span class="col-sm-5">{{ $user->name }}</span>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">
                        Email Address
                    </label>
                    <span class="col-sm-5">{{ $user->email }}</span>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">
                        Password
                    </label>
                    <span class="col-sm-5">{{ $user->password }}</span> 
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
                        Date of Birth
                    </label>
                    <span class="col-sm-5">{{ $user->dob }}</span> 
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">
                        Address
                    </label>
                    <span class="col-sm-5">{{ $user->address }}</span> 
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-primary ml-2">Create</button>
                    <button type="button" class="btn btn-outline-success"
                        onclick="location.reload();">Cancel</button>
                </div>
    </div>
</form>