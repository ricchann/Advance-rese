@extends('layouts.app')

@section('content')

<div class="container">

    @if (session('login_success'))
        <div class="alert alert-success">
            {{ session('login_success') }}
        </div>
    @endif
    <div class="mypage-name">
        <h1>{{ $user->name }}さん</h1>
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
        </div>
    </div>
</div>
@endsection
