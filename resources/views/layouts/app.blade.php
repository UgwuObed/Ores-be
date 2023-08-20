<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <!-- Scripts -->
    
  @vite('resources/css/app.css')
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('images/logo1.png') }}" alt="Logo">
            </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        
                        <div class="dropdown">
                        <button class="dropdown-toggle">User Name</button>
                        <ul class="dropdown-menu">
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="button">Logout</button>
                            </form>
                            </li>
                            <li>
                            <form method="POST" action="{{ route('deactivate', auth()->user()) }}">
                                @csrf
                                <button type="submit" class="btn btn-danger">Deactivate Account</button>
                            </form>
                            </li>
                        </ul>
                        </div>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
<style>
.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-toggle {
  padding: 10px 15px;
  background-color: purple;
  border: none;
  cursor: pointer;
  border-radius: 8px;
}

.dropdown-menu {
  position: absolute;
  top: 100%;
  left: 0;
  list-style: none;
  margin: 0;
  padding: 0;
  background-color: white;
  border: 1px solid #ccc;
  border-top: none;
  display: none;
}

.dropdown:hover .dropdown-menu {
  display: block;
}

.dropdown-menu li {
  padding: 10px 15px;
  border-bottom: 1px solid #ccc;
  text-align: left;
}

.dropdown-menu li:last-child {
  border-bottom: none;
}

.dropdown-menu a {
  text-decoration: none;
  color: #333;
}

.dropdown-menu a:hover {
  background-color: #f0f0f0;
}

.button{
    width: 127px;
    border-radius: 8px;
}

    </style>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @vite('resources/js/app.js')
</body>
</html>
