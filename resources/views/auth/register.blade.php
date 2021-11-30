@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-register">
        <div class="card-header">
            Registration
        </div>
        <div class="card-body">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="card-username">
                    <input id="name" type="text" name="name" placeholder="Username" required="required" autofocus="autofocus">
                    
                </div>
                <div class="card-email">
                    <input id="email" type="email" name="email" placeholder="E-mail" required="required">
                    
                </div>
                <div class="card-password">
                    <input id="password" type="password" name="password" placeholder="password" required="required" autocomplete="new-password">

                </div>
                <div class="card-button">
                    <button type="submit" class="register-btn">登録</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection