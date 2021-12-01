@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-login">
        <div class="card-header">
            Login
        </div>
        <div class="card-body">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="card-email">
                    <input id="email" type="email" name="email" placeholder="E-mail" :value="old('email')" required="required" autofocus="autofocus">
                    
                </div>
                <div class="card-password">
                    <input id="password" type="password" name="password" placeholder="password" required="required" autocomplete="current-password">

                </div>
                 <div class="card-button">
                    <button type="submit" class="register-btn">ログイン</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection