@extends('layout.master')

@section('title')
    Edit Buku
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
 
<form action="/books/{{$books->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group mb-3">
        <label for="title">Title</label>
        <input 
            type="text" 
            class="form-control" 
            name="title" 
            id="title" 
            value="{{$books->title }}">
    </div>

    <div class="form-group mb-3">
        <label for="genre_id">Genre</label>
        <select class="form-control" name="genre_id" id="genre_id"> 
            <option value="">Pilih Genre</option>
            @forelse ($genre as $item)
                <option value="{{ $item->id }}" 
                    {{ $books->genre_id == $item->id ? 'selected' : '' }}>
                    {{ $item->name }}
                </option>        
            @empty
                <option value="">Tidak ada genre</option>
            @endforelse
        </select>
    </div>

    <div class="form-group mb-3">
        <label for="stock">Stock</label>
        <input 
            type="text" 
            class="form-control" 
            name="stock" 
            id="stock" 
            value="{{ old('stock', $books->stock) }}">
    </div>

    <div class="form-group mb-3">   
        <label for="image">Image</label>
        <input type="file" class="form-control" name="image" id="image">

    </div>

    <div class="form-group mb-3">
        <label for="summary">Summary</label>
        <textarea 
            class="form-control" 
            name="summary" 
            id="summary" 
            cols="30" 
            rows="5">{{ old('summary', $books->summary) }}</textarea>
    </div>

    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
