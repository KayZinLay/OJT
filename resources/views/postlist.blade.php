@extends('layouts.hearder_menu')

<!-- css -->
<link href="{{ asset('css/postlist.css') }}" rel="stylesheet">

<form method="GET" action = "{{route('postlist')}}">
    <div class="container">
        <div class="post">
            <h3>PostList</h3>
            
            <div class="form-control row">
                    <input type="text"  name="search">
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                    <button class="btn btn-outline-primary" type="submit">Add</button>
                    <button class="btn btn-outline-primary" type="submit">Upload</button>
                    <button class="btn btn-outline-primary" type="submit">Download</button>
            <div>
            <div class="table">
                <table class="mb-1 table table-bordered table-striped">
                    <tr>
                                <th class="w-30">Post Title</th>
                                <th class="w-20">Post Description</th>
                                <th class="w-30">Posted User</th>
                                <th class="w-15">Posted Date</th>
                                <th class="w-15"></th>
                                <th class="w-15"></th>
                            </tr>
                            @foreach ($postList_data as $posts)
                            <tr>
                            <td>{{ $posts->title }}</td>
                            <td>{{ $posts->description }}</td>
                            <td>{{ $posts->create_user_id }}</td>
                            <td>{{ $posts->created_at }}</td>
                            <td><a href = "#">Edit</a></td>
                            <td><a href = "#">Delete</a></td>
                            </tr>
                            @endforeach
                       
                </table> 
            </div> 
    
        </div>
    </div>
</form>