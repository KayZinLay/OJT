@extends('layouts.hearder_menu')
@section('user', 'active')
@section('content')

<div class="container">
    <div class="user">
        <h5 class="user-header">Create User</h5>
        <div class="card-body">
            <form method="POST" action="{{ route('user#store') }}" id="userRegistForm">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-sm-4">
                        <i class="fas fa-address-book mr-2"></i>Name<span class="text-danger ml-2">*</span>
                    </label>
                    <input id="name" type="text" class="col-sm-6 form-control @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}">

                    @error('name')
                    <span class="col-sm-4"></span>
                    <span class="invalid-feedback col-sm-6" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-4">
                        <i class="fas fa-envelope-open mr-2"></i>Email Address<span class="text-danger ml-2">*</span>
                    </label>
                    <input id="email" type="email" class="col-sm-6 form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}">

                    @error('email')
                    <span class="col-sm-4"></span>
                    <span class="invalid-feedback col-sm-6" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-4">
                        <i class="fas fa-envelope-open mr-2"></i>Password<span class="text-danger ml-2">*</span>
                    </label>
                    <input id="password" type="password" class="col-sm-6 form-control @error('password') is-invalid @enderror"
                        name="password" value="{{ old('password') }}">

                    @error('password')
                    <span class="col-sm-4"></span>
                    <span class="invalid-feedback col-sm-6" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="confrimpassword" class="col-sm-4">
                        <i class="fas fa-envelope-open mr-2"></i>Confrim password<span class="text-danger ml-2">*</span>
                    </label>
                    <input id="confrimpassword" type="confrimpassword" class="col-sm-6 form-control @error('confrimpassword') is-invalid @enderror"
                        name="confrimpassword" value="{{ old('confrimpassword') }}">

                    @error('confrimpassword')
                    <span class="col-sm-4"></span>
                    <span class="invalid-feedback col-sm-6" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="confrimpassword" class="col-sm-4">
                        <i class="fas fa-envelope-open mr-2"></i>Confrim password<span class="text-danger ml-2">*</span>
                    </label>
                    <input id="confrimpassword" type="confrimpassword" class="col-sm-6 form-control @error('confrimpassword') is-invalid @enderror"
                        name="confrimpassword" value="{{ old('confrimpassword') }}">

                    @error('confrimpassword')
                    <span class="col-sm-4"></span>
                    <span class="invalid-feedback col-sm-6" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label><i class="fas fa-solid fa-sort mr-1"></i>Type</label>
                        <select type="text" name="type" class="form-control">
                            <option value=""></option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                            <option value="Visitor">Visitor</option>
                        </select>
                </div>
                <div class="form-group row">
                    <label for="phone" class="col-sm-4">
                        <i class="fas fa-envelope-open mr-2"></i>Phone<span class="text-danger ml-2">*</span>
                    </label>
                    <input id="phone" type="phone" class="col-sm-6 form-control @error('phone') is-invalid @enderror"
                        name="phone" value="{{ old('phone') }}">

                    @error('phone')
                    <span class="col-sm-4"></span>
                    <span class="invalid-feedback col-sm-6" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">
                        <i class="fas fa-user-friends mr-2"></i>Date of Birth<span class="text-red ml-2">*</span>
                    </label>
                    <input class="form-control col-sm-6" name="dob" id="dob">{{ old('dob') }}</input>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">
                        <i class="fas fa-user-friends mr-2"></i>Address<span class="text-red ml-2">*</span>
                    </label>
                    <textarea class="form-control col-sm-6" name="address" id="dob" rows="10">{{ old('address') }}</textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">Confirm</button>
                    <button type="button" class="btn" id="btnAdd">Clear</button>
                </div> 
    </div>
</div>