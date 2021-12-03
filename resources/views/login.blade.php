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
                @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{$error}}</li>
                    @endforeach

                    @if (session('login_error'))
                        <div class="alert-danger">
                          {{session('login_error')}}
                        </div>
                    @endif

                    @if (session('logout'))
                        <div class="alert-danger">
                          {{session('logout')}}
                        </div>
                    @endif
                  </ul>
                </div>
              @endif
                <div class="card-email">
                    <input id="email" type="email" name="email" placeholder="E-mail" required="required" autofocus="autofocus">
                
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