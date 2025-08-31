@extends('layout.master')

@section('title')
    Register
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

<form action="/register" method="POST" style="height: 55vh">
@csrf
<div class="form-group mb-3">
    <label for="title">Name</label>
    <input type="text" class="form-control" name="name" id="name" placeholder="">
</div>

<div class="form-group mb-3">
    <label for="title">Email</label>
    <input type="email" class="form-control" name="email" id="email" placeholder="">
</div>

<div class="form-group mb-3">
    <label for="title">password</label>
    <input type="password" class="form-control" name="password" id="password" placeholder="">
</div>
<div class="form-group mb-3">
    <label for="title">Confirm password</label>
    <input type="password" class="form-control" name="password_confirmation" id="password" placeholder="">
    <div class="form-text">Sudah punya akun? <a href="/login">Login disini</a></div>
</div>
<button type="submit" class="btn btn-primary">Register</button>
</form>


@endsection