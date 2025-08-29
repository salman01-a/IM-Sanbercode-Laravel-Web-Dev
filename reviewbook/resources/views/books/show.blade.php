@extends('layout.master')

@section('title')
    Detail Buku
@endsection

@section('content')
<div class="container">
   <div class="content" style="display: flex">
    <div><img src="{{asset('image/'.$books->image)}}" alt="">
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

   <div class="comment">
    
   </div>
</div>

@endsection