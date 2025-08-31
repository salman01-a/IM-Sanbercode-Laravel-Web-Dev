<?php

namespace App\Http\Controllers;

use App\Http\Middleware\isAdmin;
use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Books;
use App\Models\Comment;
use Illuminate\Support\Facades\File;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;

class BooksController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
           
            new Middleware(['auth',isAdmin::class], except: ['index', 'show']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $books = Books::all();

        return view('books.index', ['books' => $books]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $genre = Genre::all();
        return view('books.create' , ["genre" => $genre]);
        
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' =>'required',
            'image'=>'required|mimes:jpg,png,jpeg|max:2048',
            'summary'=>'required',
            'stock'=>'required',
            'genre_id' =>'required'
        ]);

            $newImageName= time().".".$request->image->extension();
            $request->image->move(public_path('image'), $newImageName);
        
            $books = new Books;
 
            $books->title = $request->title;
            $books->image = $newImageName;
            $books->summary = $request->summary;
            $books->stock = $request->stock;
            $books->genre_id = $request->genre_id;
        
            $books->save();
        
            return redirect('/books');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {   
        $books = Books::find($id);
        $genre = Genre::find($books->genre_id);
        return view('books.show', ['books' => $books, 'genre' =>$genre]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $books = Books::find($id);
        $genres = Genre::all();
        return view('books.edit', ['books' => $books, 'genre' => $genres]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'title' =>'required',
            'image'=>'mimes:jpg,png,jpeg|max:2048',
            'summary'=>'required',
            'stock'=>'required',
            'genre_id' =>'required'
        ]);

     

        $books = Books::find($id);

        if($request->has('image')){
            File::delete('image/'.$books->image);
            $newImageName= time().".".$request->image->extension();
            $request->image->move(public_path('image'), $newImageName);
            $books->image = $request->$newImageName;
        }
        $books->title = $request->title;
        $books->summary = $request->summary;
        $books->stock = $request->stock;
        $books->genre_id = $request->genre_id;
        $books->update();
        return redirect('/books');




    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $books = Books::find($id);
        $books -> delete();
        return redirect('/books'); 
    }



}
