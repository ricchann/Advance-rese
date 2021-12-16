@extends('layouts.app')

@section('content')

<div class="container">

    @if (session('login_success'))
        <div class="alert alert-success">
            {{ session('login_success') }}
        </div>
    @endif
    <div class="mypage-name">
        <h1>{{ Auth::user()->name }}さん</h1>
    </div>
    <div class="mypage-card">
        <div class="mypage-card-left">
            <h2>予約状況</h2>
            <div class="mypage-reserve">
                <div class="mypage-reserve-header">
                    <div class="mypage-reserve-ttl">
                        <i class="far fa-clock clock"></i>
                        <h3>予約1</h3>
                    </div>
                    <div class="mypage-delete">
                        <i class="far fa-times-circle cancel-btn"></i>
                    </div>
                </div>
                <table>
                    <tr>
                        <th>Shop</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Date</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Time</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Number</th>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="mypage-card-right">
            <h2>お気に入り店舗</h2>
                @if(!isset($likes[0]))
                <div class="no-main-card">
                    お気に入り登録されている店舗はありません。
                </div>
                @else
                @foreach ($likes as $like)
                    <div class="mypage-main-card">
                        <div class="mypage-image_url">
                            <img src={{ $like->store->image_url }} alt="store_img" />
                        </div>
                        <div class="mypage-main-card-content">
                            <h1 class="store_name">{{ $like->store_name }}</h1>
                            <div class="card-tag">
                                <span class="area_name"> ＃{{ $like->area_name }} </span>
                                <span class="genre_name"> ＃{{ $like->genre_name }} </span>
                            </div>
                            <div class="card-description">
                                <div class="desc-btn">
                                    <a href="/detail/{{ $like->store_id }}">詳しくみる</a>
                                </div>
                                <div class="like-btn">
                                   <a href="{{ route('mypage_like_off', $like->id) }}" class="like-btn-pink heart"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @endif
        </div>
    </div>
</div>
@endsection
