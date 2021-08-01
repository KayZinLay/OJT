@extends('layouts.hearder_menu')
@extends('layouts.footer')

<!-- css -->
<link href="{{ asset('css/list.css') }}" rel="stylesheet">

<form method="POST" action="{{ route('user#update', $user->id) }}" enctype="multipart/form-data">
    <div class="container">
            <h5 class="title">Update User</h5>
            
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label class="col-sm-4"></label>
                    <span class="col-sm-6">
                        <img src="{{ asset('storage/image/'.$user->profile) }}"  width="200" height="150"></a>
                    </span>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">
                        Name<span class="text-danger ml-2">*</span>
                    </label>
                    <input type="text" class="col-sm-6 form-control @error('name') is-invalid @enderror" name="name"
                        id="name" value="{{ old('name', $user->name) }}">
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">
                        </i>Email Address<span class="text-danger ml-2">*</span>
                    </label>
                    <input type="text" class="col-sm-6 form-control @error('email') is-invalid @enderror" name="email"
                        id="name" value="{{ old('email', $user->email) }}">
                </div>
                @error('email')
                    <span class="col-sm-4"></span>
                    <span class="invalid-feedback col-sm-6" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
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
                    <label class="col-sm-4">
                        Phone
                    </label>
                    <input type="text" class="col-sm-6 form-control @error('type') is-invalid @enderror" name="phone"
                        id="phone" value="{{ old('phone', $user->phone) }}">
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">
                        Date of Birth
                    </label>
                    <input type="date" class="col-sm-6 form-control @error('dob') is-invalid @enderror" name="dob"
                        id="dob" value="{{ old('dob', $user->dob) }}">
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">
                        <</i>Address
                    </label>
                    <input type="text" class="col-sm-6 form-control @error('address') is-invalid @enderror" name="address"
                        id="address" value="{{ old('address', $user->address) }}">
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
                <div class="form-group row">
                    <span class="col-sm-11 text-red font-weight-bolder font">
                    <a href="{{ route('user#pwdchange') }}" class="col-sm-4">Password
                                Change</a></span>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-primary ml-2">Update</button>
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
