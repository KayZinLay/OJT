@extends('layouts.hearder_menu')
@extends('layouts.footer')


<!-- css -->
<link href="{{ asset('css/list.css') }}" rel="stylesheet">

<form method="POST" action="{{ route('user#store') }}"  enctype='multipart/form-data'>
    <div class="container">
        
        <h5 class="title">Create User</h5>
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-sm-4">
                        Name<span class="text-danger ml-2">*</span>
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
                        Email Address<span class="text-danger ml-2">*</span>
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
                        Password<span class="text-danger ml-2">*</span>
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
                        Confrim password<span class="text-danger ml-2">*</span>
                    </label>
                    <input id="confrimpassword" type="password" class="col-sm-6 form-control @error('confrimpassword') is-invalid @enderror"
                        name="confrimpassword" value="{{ old('confrimpassword') }}">

                    @error('confrimpassword')
                    <span class="col-sm-4"></span>
                    <span class="invalid-feedback col-sm-6" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="role" class="col-sm-4">
                        Type<span class="text-danger ml-2">*</span>
                    </label>
                    <select id="type" class="col-sm-6 custom-select form-control @error('type') is-invalid @enderror"
                        name="type">
                            <option value="0">Admin</option>
                            <option value="1">User</option>
                        </select>

                    @error('type')
                    <span class="col-sm-4"></span>
                    <span class="invalid-feedback col-sm-6" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="phone" class="col-sm-4">
                        Phone
                    </label>
                    <input id="phone" type="text" class="col-sm-6 form-control @error('phone') is-invalid @enderror"
                        name="phone" value="{{ old('phone') }}"></input>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">
                        Date of Birth
                    </label>
                    <input class="form-control col-sm-6" type="date" name="dob" id="dob">{{ old('dob') }}</input>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">
                        Address
                    </label>
                    <textarea class="form-control col-sm-6" name="address" id="dob" rows="10">{{ old('address') }}</textarea>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">
                        Profile<span class="text-red ml-2">*</span>
                    </label>
                    <input type="file" name="profile" class="form-control col-sm-6" onchange="loadPreview(this);" id="profile_image" width="200" height="150" required>{{ old('profile') }}</input>
                    <label for="profile_image" class="col-sm-4"></label>
                    <img id="preview_img" class="" width="200" height="150"/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-primary ml-2">Confrim</button>
                    <button type="button" class="btn btn-outline-success"
                        onclick="location.reload();">Clear</button>
                </div> 
    
    </div>
</form>

<script>
  function loadPreview(input, id) {
    id = id || '#preview_img';
    if (input.files && input.files[0]) {
        var reader = new FileReader();
 
        reader.onload = function (e) {
            $(id)
                    .attr('src', e.target.result)
                    .width(200)
                    .height(150);
        };
 
        reader.readAsDataURL(input.files[0]);
    }
 }
</script>

