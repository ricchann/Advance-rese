@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card_done">
      <div class="done_container">
        <h2 class="done-ttl">ご予約ありがとうございました。</h2>
        <a class=done-btn href="{{ route('home') }}">戻る</a>
      </div>
    </div>
  </div>
@endsection
