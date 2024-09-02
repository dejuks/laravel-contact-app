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
        <h2 class="title">Login</h2>
        <form action="{{url('checkuser')}}" method="post">
            @csrf
            <input type="text" name="email" placeholder="Username or Email">
            <input type="password" name="password" placeholder="Password">
            <button type="submit" class="btn btn-sm btn-block">Login</button>
       <p class="message">
           Not Registered yet <a href="{{url('register')}}">Creat Account</a>
       </p>
        </form>
    </div>
</div>

</body>
</html>
