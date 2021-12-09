<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Rese</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

        <!-- Styles -->
        @if(app('env') == 'production')
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('/css/style.css') }}" rel="stylesheet">
        @else
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
        @endif

        <!-- Scripts -->
        @if(app('env') == 'production')
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        @else
        <script src="{{ asset('js/app.js') }}" defer></script>
        @endif
    </head>

    <body>
        <header>
            <nav class="nav" id="nav">
                <ul>
                    <li>
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
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
                <a class="" href="{{ route('home') }}">Rese</a>
            </div>
        </header>

        <main class="main-container">
            @yield('content')
        </main>

         @if(app('env') == 'production')
        <script src="{{ secure_asset('js/main.js') }}"></script>
        @else
        <script src="{{ asset('js/main.js') }}"></script>
        @endif

    </body>
</html>
