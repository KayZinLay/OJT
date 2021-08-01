@extends('layouts.hearder_menu')
@extends('layouts.footer')


<!-- css -->
<link href="{{ asset('css/list.css') }}" rel="stylesheet">

     <!-- Form -->
     <form method='post' action='/fileUploadPost' enctype='multipart/form-data' >
      <div class="container">
          <h5 class="title">Import File From</h5>
        {{ csrf_field() }}  
        <input type='file' name='file' >
        <input type='submit' name='submit' value='Import File'>
        </div>
     </form>
