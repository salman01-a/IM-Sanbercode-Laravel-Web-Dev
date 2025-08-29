@extends('layout.master')

@section('title')
    List Buku
@endsection

@section('content')
<div class="mb-4">
    <a href="{{ route('books.create') }}" class="btn btn-primary">Tambah</a>
</div>

<div class="row">   
    @forelse ($books as $item)
        <div class="col-md-3 col-sm-6 col-12 mb-4">
            <div class="card h-100 shadow-sm">
                <img src="{{asset('image/'.$item->image)}}" 
                     class="card-img-top" 
                     alt="{{ $item->title }}" 
                     style="height: 350px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->title }}</h5>
                    <p class="card-text">{{ Str::limit($item->summary, 80) }}</p>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="/books/{{$item->id}}" class="btn btn-sm btn-info">Detail</a>
                    <a href="/books/{{$item->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
                    <form action="/books/{{$item->id}}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </div>
            </div>          
        </div>
    @empty  
        <h1 class="text-center">Belum Ada Data</h1>
    @endforelse
</div>
@endsection