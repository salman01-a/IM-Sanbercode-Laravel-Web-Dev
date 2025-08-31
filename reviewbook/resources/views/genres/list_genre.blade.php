@extends('layout.master')

@section('title')
    List Genre
@endsection

@section('content')
@auth
@if (Auth()->user()->role === "admin")
    
<a href="/genre/create" class="btn btn-primary">Tambah</a> 
@endif
@endauth
<table class="table">
    <thead class="thead-light">
      <tr>
        <th scope="col">No</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($genre as $key=>$value)
            <tr>
                <td>{{$key + 1}}</th>
                <td>{{$value->name}}</td>
                <td>{{$value->description}}</td>
                <td>
                    <a href="/genre/{{$value->id}}" class="btn btn-info">Show</a>
                    @auth    
                    @if (Auth()->user()->role === "admin")
                    <a href="/genre/{{$value->id}}/edit" class="btn btn-primary">Edit</a>
                    <form action="/genre/{{$value->id}}" method="POST" onsubmit="return confirm('are you sure delete data?')" >
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger my-1" value="Delete">
                        @endif
                    @endauth
                    </form>
                </td>
            </tr>
        @empty
            <tr colspan="3">
                <td>No data</td>
            </tr>  
        @endforelse              
    </tbody>
</table>
@endsection