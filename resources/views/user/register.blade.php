<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ContactApp</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" />
    {{--    <link href="{{asset('assets/css/estyle.css')}}" rel="stylesheet" />--}}
</head>
<body>
<div class="login-signup-form animated shadow">
    <div class="form">
        <h2 class="title">Registration</h2>
        <form action="{{url('save')}}" method="post">
            @csrf

            <input type="text" name="name" placeholder="Full Name">
            @error('name')
            <p class="text text-danger">{{$message}}</p>
            @enderror
            <input type="text" name="email" placeholder="Email">
            @error('email')
            <p class="text text-danger">{{$message}}</p>
            @enderror
            <input type="password" name="password" placeholder="Password">
            @error('password')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <button type="submit" class="btn btn-sm btn-block">Register</button>
            <p class="message">
                All ready registered <a href="{{url('login')}}">Login</a>
            </p>
        </form>
    </div>
</div>

</body>
</html>
