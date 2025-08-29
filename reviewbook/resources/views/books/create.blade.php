@extends('layout.master')

@section('title')
    Tambah Data
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
 
<form action="/books" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-3">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="">
    </div>

    <div class="form-group mb-3">
        <label for="title">Genre</label>
        <select class="form-control" name="genre_id" id="genre_id"> 
            <option value="">Pilih Genre</option>
            @forelse ($genre as $item)
            <option value="{{$item->id }}"> {{$item->name}}</option>        
            @empty
            <option value="">Tidak ada genre</option>
            @endforelse
        </select>

    </div>

    <div class="form-group mb-3">
        <label for="title">Stock</label>
        <input type="text" class="form-control" name="stock" id="stock" placeholder="">
    </div>

    <div class="form-group mb-3">   
        <label for="title">Image</label>
        <input type="file" class="form-control" name="image" id="image" placeholder="">
    </div>

    <div class="form-group mb-3">
        <label for="body">Summary</label>
        <textarea class="form-control" name="summary" id="summary" cols="30" rows="10"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Tambah</button>
</form>
@endsection