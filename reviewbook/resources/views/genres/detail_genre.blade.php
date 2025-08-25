@extends('layout.master')

@section('title')
    Detail Genre
@endsection

@section('content')
<h2>ID: {{$genre->id}}</h2>
<h4>Name: {{$genre->name}}</h4>
<p>Description: {{$genre->description}}</p>
<a href="/genre" class="btn btn-primary">Back</a>
@endsection