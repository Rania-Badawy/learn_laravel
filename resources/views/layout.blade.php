<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>
    <div>
        <ul>
            @guest
            <li><a href="{{url('/register')}}">Register</a></li>
            <li><a href="{{url('/login')}}">Login</a></li>
            @endguest

            @auth
            <li><a href="{{url('/logout')}}">Logout</a></li>
            @endauth
        </ul>

    </div>
   
    @yield('body')
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>