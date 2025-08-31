<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Genre;
class GenreController extends Controller
{
    //
    public function index(){
        $genre = DB::table('genres')->get();
 
        return view('genres.list_genre', ['genre' => $genre]); 
        

    }

    public function create(){
        return view('genres.tambah_genre');
    }
    public function store(Request $request  ){
        // dd($request->all());
        $request->validate([
            'name' => 'required|min:4',
            'description' => 'required',
        ]);
        $now = Carbon::now();
        DB::table('genres')->insert([
            'name' => $request['name'],
            'description' => $request['description'],
            'created_at' => $now,
            'updated_at' => $now
        ]);

        return redirect('/genre');
    }

    public function show($id){
        $genre = Genre::find($id);
        return view('genres.detail_genre', ['genre' => $genre]); 
    }

    
    public function edit($id){
        $genre = DB::table('genres')->find($id  );
        return view('genres.edit_genre', ['genre' => $genre]); 
    }

    public function update($id, Request $request){
        $request->validate([
            'name' => 'required|min:4',
            'description' => 'required',
        ]);

        $query = DB::table('genres')
        ->where('id', $id)
        ->update([
            'name' => $request["name"],
            'description' => $request["description"]
        ]);
    return redirect('/genre');
    }

    public function destroy($id){
        $query = DB::table('genres')->where('id', $id)->delete();
        return redirect('/genre');
    }
}
