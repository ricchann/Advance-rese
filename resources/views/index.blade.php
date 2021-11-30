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
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

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
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                            Logout
                            </a>
                        </form>
                    </li>
                    <li>
                        <a class="nav-link" href="">Mypage</a>
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
                <a class="" href="">Rese</a>
            </div>

            <div class="search-box">
                <form class="search-box-form" method="get" action="">
                    @csrf
                    <select name="area" id="area" class="area-select">
                        <option name="area" id="area" value="All" >All area</option>
                        <option name="area" value="東京都">東京都</option>
                        <option name="area" value="大阪府">大阪府</option>
                        <option name="area" value="福岡県">福岡県</option>
                    </select>
                    <select name="genre" id="genre" class="genre-select">
                        <option name="genre" id="genre" value="All">All genre</option>
                        <option name="genre" value="寿司">寿司</option>
                        <option name="genre" value="焼肉">焼肉</option>
                        <option name="genre" value="居酒屋">居酒屋</option>
                        <option name="genre" value="イタリアン">イタリアン</option>
                        <option name="genre" value="ラーメン">ラーメン</option>
                    </select>

                    <input type="search" placeholder="Search ..." name="name" id="name">

                    <button class="search-btn" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </header>

        <main>
            <div class="container">
                <div class="main-wrapper">
                    @foreach ($items as $item)
                    <div class="main-card">
                        <div class="image_url">
                            <img src={{ $item->image_url }} />
                        </div>
                        <div class="main-card-content">
                            <h1 class="store_name">{{ $item->name }}</h1>
                            <span class="area_name"> ＃{{ $item->area_name }} </span>
                            <span class="genre_name"> ＃{{ $item->genre_name }} </span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </main>
        <script src="{{ asset('js/main.js') }}"></script>
    </body>