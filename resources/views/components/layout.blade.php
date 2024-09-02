<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ContactApp</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet"/>
    {{--        <link href="{{asset('assets/css/estyle.css')}}" rel="stylesheet" />--}}
</head>
<body>
<div id="defaultLayout">
    <aside>
        <a href="#">Dashboard</a>
        <a href="{{url('contact-list')}}">Contacts</a>
    </aside>
    <div class="content">
        <header>
            <div>

                Header
            </div>
            <div>
              {{Auth::user()->name}}
                <a href="{{url('logout')}}" class="btn-logout">Logout</a>
            </div>
        </header>
        <main>
            {{$slot}}
        </main>
    </div>

</div>
</body>
</html>
