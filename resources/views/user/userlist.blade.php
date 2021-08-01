@extends('layouts.hearder_menu')
@extends('layouts.footer')

<!-- css -->
<link href="{{ asset('css/list.css') }}" rel="stylesheet">

<div class="container">
    <h3 class="title">User List<h3>
        <form method="GET" action="{{route('userlist')}}" id="searchform">
            <div class="form-group">
           
                <input type="text" name="name" placeholder="Name" size="13">
                <input type="text" name="email" placeholder="Email" size="13">
                <input type="date" name="createdFrom" placeholder="Create From" size="13">
                <input type="date" name="createdTo" placeholder="Create To" size="13">
                <button type="submit" class="btn btn-outline-primary">Search</button>
                <button type="button" onclick="window.location='{{ route("user#register") }}'" class="btn btn-outline-primary">Add</button>
                    
            </div>
        </form>
            <div class="table">
                <table class="mb-1 table table-bordered table-striped">
                    <tr>
                        <th class="w-25">Name</th>
                        <th class="w-35">Email</th>
                        <th class="w-30">Created User</th>
                        <th class="w-25">Phone</th>
                        <th class="w-30">Birth Date</th>
                        <th class="w-15">Address</th>
                        <th class="w-40">Created Date</th>
                        <th class="w-40">Updated Date</th>
                        <th class="w-15"></th>
                    </tr>
                    @foreach ($userDataList as $users)
                        <tr>
                        <td><a href="#">{{ $users->name }}</a></td>
                        <td>{{ $users->email }}</td>
                        <td>{{ $users->name}}</td>
                        <td>{{ $users->phone }}</td>
                        <td>{{ $users->dob }}</td>
                        <td>{{ $users->address }}</td>
                        <td>{{ $users->created_at }}</td>
                        <td>{{ $users->updated_at }}</td>
                        <td><a href = 'delete/{{ $users->id }}' onclick="return confirm('Are you sure?')">Delete</a></td>
                        </tr>
                        @endforeach   
                </table> 
                
            </div> 
</div>
<div class="mt-3 text-center">
            {{ $userDataList->links() }}
    </div>