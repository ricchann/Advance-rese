@extends('layouts.app')

@section('content')
    <div class="store-detail">
        <div class="store-card">
            <div class="store-header">
                <button type="button" class="store-back" onclick="history.back()"><</button>
                <h2 class="store-ttl">{{ $item->name }}</h2>
            </div>
            <div class="store-box">
                <img src="{{ $item->image_url }}" alt="store_img" class="store_img">
                <div class="store-tag">
                    <p class="store-tag-txt"> ＃ {{ $item->area_name }}</p>
                    <p class="store-tag-txt">　＃ {{ $item->genre_name }}</p>
                </div>
                <p class="store-description">{{ $item->description }}</p>
            </div>
        </div>
        <div class="reserve-card">
            <form action="" method="">
                @csrf
                <h3 class="reserve-ttl">予約</h3>
                <div class="reserve-item">
                    <ul class="reserve-form">
                        <input type="hidden" name="store_id" value="{{ $item->id }}" id="">
                        <li class="reserve-form-item">
                            <input type="date" name="date" class="reserve-input" id="">
                        </li>
                        <li class="reserve-form-item">
                            <select name="time" class="reserve-select" id="">
                                <option value="">選択してください</option>
                                <option value="17:00">17:00</option>
                                <option value="17:30">17:30</option>
                                <option value="18:00">18:00</option>
                                <option value="18:30">18:30</option>
                                <option value="19:00">19:00</option>
                                <option value="19:30">19:30</option>
                                <option value="20:00">20:00</option>
                                <option value="20:30">20:30</option>
                                <option value="21:00">21:00</option>
                                <option value="21:30">21:30</option>
                                <option value="22:00">22:00</option>
                                <option value="22:30">22:30</option>
                            </select>
                        </li>
                        <li class="reserve-form-item">
                            <select name="number" class="reserve-select" id="">
                                <option value="">選択してください</option>
                                <option value="1">1名</option>
                                <option value="2">2名</option>
                                <option value="3">3名</option>
                                <option value="4">4名</option>
                                <option value="5">5名</option>
                                <option value="6">6名</option>
                                <option value="7">7名</option>
                                <option value="8">8名</option>
                                <option value="9">9名</option>
                                <option value="10">10名</option>
                            </select>
                        </li>
                    </ul>
                    <div class="reserve-table">
                        <table>
                            <tr>
                                <th>Shop</th>
                                <td>{{ $item->name }}</td>
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
                    <button class="reserve-btn">予約する</button>
                </div>
            </form>
        </div>
    </div>
@endsection
