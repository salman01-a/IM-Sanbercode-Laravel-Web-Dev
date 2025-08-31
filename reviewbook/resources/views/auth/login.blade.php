@extends('layout.master')

@section('title')
    Login
@endsection

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="/login" method="POST" style="height: 55vh">
@csrf

<div class="form-group mb-3">
    <label for="title">Email</label>
    <input type="email" class="form-control" name="email" id="email" placeholder="">
</div>

<div class="form-group mb-3">
    <label for="title">password</label>
    <input type="password" class="form-control" name="password" id="password" placeholder="">
    <div class="form-text">Belum punya akun? <a href="/register">Daftar disini</a></div>
</div>

<button type="submit" class="btn btn-primary">Login</button>
</form>


@endsection