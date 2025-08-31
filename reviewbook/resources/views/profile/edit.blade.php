@extends('layout.master')

@section('title')
    Buat Profile
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


@if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

<form action="/profile/{{$profile->id}}" method="POST">
@csrf
@method('PUT')
<div class="form-group mb-3">
    <label for="title">Age</label>
    <input type="number" class="form-control" name="age" id="age" value="{{$profile->age}}">
</div>
<div class="form-group mb-3">
    <label for="body">address</label>
    <textarea class="form-control" name="address" id="address" cols="30" rows="10">{{$profile->address}}</textarea>
</div>
<button type="submit" class="btn btn-primary">Edit Profile</button>
</form>
@endsection