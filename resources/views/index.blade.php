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

                    <div class="search-input">
                    <input type="search" placeholder="Search ..." name="name" id="name">

                    <button class="search-btn" type="submit" style="display:none;">
                        検索
                    </button>
                    </div>
                </form>
            </div>
        </header>

        <main>
            <div class="main-container">
                <div class="main-wrapper">
                    @foreach ($items as $item)
                    <div class="main-card">
                        <div class="image_url">
                            <img src={{ $item->image_url }} alt="store_img" />
                        </div>
                        <div class="main-card-content">
                            <h1 class="store_name">{{ $item->name }}</h1>
                            <div class="card-tag">
                                <span class="area_name"> ＃{{ $item->area_name }} </span>
                                <span class="genre_name"> ＃{{ $item->genre_name }} </span>
                            </div>
                            <div class="card-description">
                                <div class="desc-btn">
                                    <a href="/detail/{{ $item->id }}">詳しくみる</a>
                                </div>
                                <div class="like-btn">
                                    @if ($item->is_liked_by_auth_user())
                                        <a href="{{ route('like_off', ['id' =>  $item->id]) }}" class="like-btn-pink heart"></a>
                                    @else
                                        <a href="{{ route('like_on', ['id' => $item->id]) }}" class="like-btn-gray heart"></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </main>
        @if(app('env') == 'production')
        <script src="{{ secure_asset('js/main.js') }}"></script>
        @else
        <script src="{{ asset('js/main.js') }}"></script>
        @endif
    </body>
