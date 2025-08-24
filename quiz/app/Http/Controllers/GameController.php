<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class GameController extends Controller
{
    //
    public function index(){
        $game = DB::table('game')->get();
 
        return view('game.index', ['game' => $game]);     

    }

    public function create(){
        return view('game.create');
    }
    public function store(Request $request  ){
        // dd($request->all());
        $request->validate([
            'name' => 'required|min:4',
            'gameplay' => 'required',
            'developer' => 'required',
            'year' => 'required',
        ]);
        $now = Carbon::now();
        DB::table('game')->insert([
            'name' => $request['name'],
            'gameplay' => $request['gameplay'],
            'developer' => $request['developer'],
            'year' => $request['year'],
            'created_at' => $now,
            'updated_at' => $now
        ]);

        return redirect('/game');
    }

    public function show($id){
        $game = DB::table('game')->find($id);
        return view('game.show', ['game' => $game]); 
    }

    
    public function edit($id){
        $game = DB::table('game')->find($id  );
        return view('game.edit', ['game' => $game]); 
    }

    public function update($id, Request $request){
        $request->validate([
            'name' => 'required|min:4',
            'gameplay' => 'required',
            'developer' => 'required',
            'year' => 'required',
        ]);

        $query = DB::table('game')
        ->where('id', $id)
        ->update([
            'name' => $request['name'],
            'gameplay' => $request['gameplay'],
            'developer' => $request['developer'],
            'year' => $request['year'],
        ]);
    return redirect('/game');
    }

    public function destroy($id){
        $query = DB::table('game')->where('id', $id)->delete();
        return redirect('/game');
    }
}
