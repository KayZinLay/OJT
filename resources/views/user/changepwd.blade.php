@extends('layouts.hearder_menu')
@extends('layouts.footer')

<!-- css -->
<link href="{{ asset('css/list.css') }}" rel="stylesheet">

<form method="GET" action="{{ route('user#change') }}">
    <div class="container">
            <h5 class="title">Change Password</h5>
            
            @csrf
                    <div class="form-group row">
                        <label class="col-sm-4">Old Password</label>
                        <input type="password" id="oldPwd" value="{{ old('password') }}" class="col-sm-6 form-control"
                            name="password" autocomplete="off">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4">New Password</label>
                        <input type="password" id="newPwd" value="{{ old('newpassword') }}" class="col-sm-6 form-control"
                            name="newpassword" autocomplete="off">
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4">Confirm Password</label>
                        <input type="password" class="col-sm-6 form-control @error('confirmPwd') is-invalid @enderror"
                            name="confirmPwd" id="confirmPwd" value="{{ old('confirmPwd') }}" autocomplete="off">
                        @error('confirmPwd')
                        <span class="col-sm-4"></span>
                        <span class="invalid-feedback col-sm-6" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-primary ml-2">Change</button>
                    <button type="button" class="btn btn-outline-success"
                        onclick="location.reload();">Clear</button>
                </div>
    </div>
</form>