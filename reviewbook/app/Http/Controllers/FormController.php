<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function register(){
        return view("register");
    }

    public function submit (Request $req){
        // dd($req->all());
        $firstName = $req->input('firstName');
        $lastName = $req->input('lastName');

        return view('welcome', ['firstName' => $firstName , 'lastName' => $lastName ]);
    }
}
