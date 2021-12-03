@extends('layouts.app')

@section('content')

@if (session('login_success'))
  <div class="alert alert-success">
      {{ session('login_success') }}
  </div>
@endif

@endsection