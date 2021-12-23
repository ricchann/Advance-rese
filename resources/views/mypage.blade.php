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
            @if(!isset($reserves[0]))
            <div class="mypage-noreserve">
                現在予約はありません。
            </div>
            @else
            @foreach($reserves as $reserve)
            <div class="mypage-reserve">
                <div class="mypage-reserve-header">
                    <div class="mypage-reserve-ttl">
                        <i class="far fa-clock clock"></i>
                        <h3>予約1</h3>
                    </div>
                    <form action="{{ route('delete') }}" method="POST">
                    @csrf
                        <div class="mypage-delete">
                            <button class="far fa-times-circle cancel-btn" onclick="return confirm('予約をキャンセルしますか？')"></button>
                            <input type="hidden" value="{{$reserve->id}}" name="id">
                        </div>
                    </form>
                </div>
                <table>
                    <tr>
                        <th>Shop</th>
                        <td>{{ $reserve->store_name }}</td>
                    </tr>
                    <tr>
                        <th>Date</th>
                        <td>{{ $reserve->reserve_datetime->format('Y-m-d') }}</td>
                    </tr>
                    <tr>
                        <th>Time</th>
                        <td>{{ $reserve->reserve_datetime->format('H:i') }}</td>
                    </tr>
                    <tr>
                        <th>Number</th>
                        <td>{{ $reserve->num_of_users }}</td>
                    </tr>
                </table>
            @endforeach
            @endif
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
                                    <a href="{{ route('detail', $like->id) }}">詳しくみる</a>
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
