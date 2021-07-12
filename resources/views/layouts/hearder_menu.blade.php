<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('login', 'SCM Bulletin Board') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/common.js') }}"></script>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

</head>

<body class="d-flex flex-column">
    <nav class="navbar navbar-expand-lg navbar-dark nav-bg-primary fixed-top">
        <div class="topnav">
            <a class="navbar-brand"><h3>SCM Bulletin Board<h3></a>
            <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                @auth
                @if (Auth::user()->role_id == config('constants.ROLES_NAME.Admin'))
                <a class="navbar-brand" href="{{ route('postlist') }}">
                Users
                </a>
                @else
                <a class="navbar-brand" href="{{ route(userRegister) }}">
                User
                </a>
                @endif
                @endauth
                <a class="navbar-brand" href="{{ route('postlist') }}">
                    User
                </a>
                <a class="navbar-brand" href="{{ route('postlist') }}">
                    Posts
                </a>
                <a class="navbar-brand login-right" href="{{ route('postlist') }}">loginusername</a>
                <a class="navbar-brand" href="#" class="login">logout</a>
            </ul>
            </div>
           
        </div>
    </nav>
</body>
</html>