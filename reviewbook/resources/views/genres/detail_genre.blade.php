@extends('layout.master')

@section('title')
    Detail Genre
@endsection

@section('content')
<a href="/genre" class="btn btn-primary">Back</a>

<h4>Name: {{$genre->name}}</h4>
<p>Description: {{$genre->description}}</p>
<div class="my-3">
    List Buku di genre ini
</div>
<div class="row">   
@forelse ($genre->Books as $item) 
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
                </div>
            </div>          
        </div>
           
            
            @empty
            
            <h1>Tidak ada buku di genre ini</h1>
            @endforelse
</div>

@endsection