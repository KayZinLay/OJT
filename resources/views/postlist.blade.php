@extends('layouts.hearder_menu')

<!-- css -->
<link href="{{ asset('css/list.css') }}" rel="stylesheet">

<form method="GET" action="{{route('postlist')}}">
    <div class="container">
        <h3 class="title">Post List<h3>
            <div class="form-group">
                    <input type="text"  name="searchname">
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                    <button type="button" onclick="window.location='{{ route("post#postregister") }}'" class="btn btn-outline-primary">Add</button>
                    <button class="btn btn-outline-primary" onclick="window.location='{{ route("upload-file") }}'" type="button">Upload</button>
                    <a class="btn btn-outline-primary" href="{{ route('export_excel.excel') }}">Download</a>
            </div>
            <div class="table">
                <table class="mb-1 table table-bordered table-striped">
                    <tr>
                                <th class="w-30">Post Title</th>
                                <th class="w-20">Post Description</th>
                                <th class="w-30">Posted User</th>
                                <th class="w-20">Posted Date</th>
                                <th class="w-10"></th>
                                <th class="w-10"></th>
                    </tr>
                            @foreach ($postList_data as $posts)
                            <tr>
                            <td>{{ $posts->title }}</td>
                            <td>{{ $posts->description }}</td>
                            <td>{{ $posts->name}}</td>
                            <td>{{ $posts->created_at }}</td>
                            <td><a href = "{{ route('post#edit', $posts->id) }}">Edit</a></td>
                            <td><a href = "{{ route('post#delete', $posts->id) }}" onclick="return confirm('Are you sure?')">Delete</a></td>
                            </tr>
                            @endforeach
                </table> 
            </div> 
            
            
    </div>
    <div class="mt-3 text-center">
            {{ $postList_data->links() }}
    </div>
</form>