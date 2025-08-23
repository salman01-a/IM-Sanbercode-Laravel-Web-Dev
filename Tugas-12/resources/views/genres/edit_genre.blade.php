@extends('layout.master')

@section('title')
    Edit Data
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
 
<form action="/genre/{{$genre->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group mb-3">
        <label for="title">Name</label>
        <input type="text" class="form-control" name="name" id="name" value="{{$genre ->name}}">
    </div>
    <div class="form-group mb-3">
        <label for="body">Description</label>
        <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{$genre->description}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Edit</button>
</form>
@endsection