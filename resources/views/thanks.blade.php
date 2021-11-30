@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card_thanks">
      <div class="thanks_container">
        <h2 class="thanks-ttl">会員登録ありがとうございます</h2>
        <a class=thanks-btn href="{{ route('login') }}">ログインする</a>
      </div>
    </div>
  </div>
@endsection