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
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">BasketBase</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <!--
                <li class="nav-item">
                    <a class="nav-link" href="#">A page</a>
                </li>
                -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Display
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="{{ url('/players') }}">Players</a></li>
                        <li><a class="dropdown-item" href="{{ url('/coaches') }}">Coaches</a></li>
                        <li><a class="dropdown-item" href="{{ url('/members') }}">Every listed members</a></li>
                    </ul>
                </li>
            </ul>
          </div>
        </div>
    </nav>
    <div id="content">
        @yield('content')
    </div>
    <script src="{{ asset('/lib/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/lib/jquery/jquery-3.6.0.min.js') }}"></script>
</body>
</html>