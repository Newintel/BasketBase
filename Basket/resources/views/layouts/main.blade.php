<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('page_title')</title>
    <link rel="stylesheet" href="{{ asset('/lib/bootstrap/bootstrap.min.css') }}">
    @yield('style')
    @php
        $style ??= [];
        array_push($style, "main");
    @endphp
    @foreach ($style as $css)
        <link rel="stylesheet" href="{{ asset('css/'.trim($css).'.css') }}">
    @endforeach
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mx-auto only-in-self">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">BasketBase</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/players') }}">Players</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/coaches') }}">Coaches</a>
                    </li>
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Add data
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="{{ route('members.create') }}">Member/Coach/Player</a></li>
                                <li><a class="dropdown-item" href="{{ route('players.create') }}">Player</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown ms-auto">
                            <a href="" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                Bienvenue, {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li>
                                    <a href="{{ route('logout') }}" class="dropdown-item"
                                        onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form action="{{ route('logout') }}" id="logout-form" method="post," style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item ms-auto">
                            <a href="{{ route('login') }}" class="nav-link active ms-auto" aria-current="page">Login</a>
                        </li>
                        <li class="nav-item ms-auto">
                            <a href="{{ route('register') }}" class="nav-link active ms-auto" aria-current="page">Register</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    <div id="content" class="container">
        @yield('content')
    </div>
    <script src="{{ asset('/js/main.js') }}"></script>
    <script src="{{ asset('/lib/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/lib/jquery/jquery-3.6.0.min.js') }}"></script>
</body>
</html>