@extends('layout.master')

@section('title')
    Detail Buku
@endsection

@section('content')

<div class="container">
  <div class="mb-4">
    <a href="/books" class="btn btn-primary">Back</a>
  </div>

   <div class="content d-flex gap-4">

    <div class="book-image" style="width: 620px; height: 350px; overflow: hidden; border-radius: 10px; box-shadow: 0 2px 6px rgba(0,0,0,0.15)">
        <img src="{{ asset('image/'.$books->image) }}" 
             alt="{{ $books->title }}" 
             style="width: 100%; height: 100%; object-fit: cover;">
    </div>
    <div class="info" style="">
        <table class="table table-borderless" >
            <tbody>
              <tr>
                <th scope="row">Title: </th>
                <td>{{$books->title}}</td>
              </tr>
              <tr>
                <th scope="row">Genre: </th>
                <td>{{$genre->name}}</td>
              </tr>
              <tr>
                <th scope="row">Stock</th>
                <td>{{$books->stock}}</td>
              </tr>

              <tr>
                <th scope="row">Summary</th>
                <td>{{$books->summary}}</td>
              </tr>
            </tbody>
          </table>
    </div>
   </div>
   <hr>

   <div class="comment">
    <h3>Komentar</h3>
    @forelse ($books->comment as $item)
    <div class="card w-100 mb-3">
        <div class="card-body">
          <h6 class="card-title">{{$item->user->name}}</h6>
          <p class="card-text">{{$item->content}}</p>
        </div>
      </div>

    @empty
        <h5>Belum ada komentar</h5>
    @endforelse
    <hr>
    <form action="/comments/{{$books->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="body">Tulis komentar</label>
            <textarea class="form-control" name="content" id="content" cols="30" rows="10"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" @guest
            disabled
        @endguest>Tambah Komentar</button>
    </form>
   </div>
</div>

@endsection