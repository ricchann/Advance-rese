<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/style.css') }}" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>

    <body>
        <header>
            <nav class="nav" id="nav">
                <ul>
                    <li>
                        <a class="nav-link" href="http://127.0.0.1:8000/">Home</a>
                    </li>
                    @auth
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="nav-link" >
                            Logout
                            </button>
                        </form>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('mypage') }}">Mypage</a>
                    </li>
                    @endauth
                    @guest
                    <li>
                        <a class="nav-link" href="{{ route('register') }}">Registration</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    @endguest
                </ul>
            </nav>

            <div class="menu" id="menu">
                <span class="menu__line--top"></span>
                <span class="menu__line--middle"></span>
                <span class="menu__line--bottom"></span>
            </div>

            <div class="header-logo">
                <a class="" href="http://127.0.0.1:8000/">Rese</a>
            </div>
        </header>

        <main class="main-container">
            @yield('content')
        </main>

        <script src="{{ asset('js/main.js') }}"></script>

    </body>
</html>
