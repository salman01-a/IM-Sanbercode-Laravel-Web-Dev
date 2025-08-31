<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;

class AuthController extends Controller 
{
  

    public function showregister(){
        return view('auth.register');
    }

    public function register(Request $request){
        $request->validate([
            'name'=>'required|min:5',
            'email'=> 'required|email',
            'password'=> 'required|confirmed|min:8'
        ]);
        $userCount = User::count();
        $user = new User;
        $user -> name = $request->name;
        $user -> email = $request->email;
        $user -> password =Hash::make( $request->password);
        $user -> role = $userCount === 0? 'admin':'user';
        $user->save();

        return redirect('/login');
    }

    public function showlogin(){
        return view('auth.login');
    }   

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/')->with("success", "Berhasil Login");
        }

        return back()->withErrors([
            'email' => 'Email Atau Password Salah',
        ])->onlyInput('email');
    }

    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/')->with("success", "Berhasil Logout");
    }

    public function getprofile(){
        if (!Auth::check()){
            return redirect('/')->with('danger', 'Login dlu bang');
        }

        $UserAuth= Auth::User()->profile;
        $UserId= Auth::id();
        $profilData = Profile::where('users_id', $UserId)->first();

        if($UserAuth){
            return view('profile.edit', ['profile' => $profilData]);
        }else{
            return view('profile.create');
        }

    }

    public function create(Request $request){
         $request->validate([
            'age' => 'required|numeric',
            'address' =>'required'

         ]);

        $profil = new Profile();
        $UserId= Auth::id();
        $profil->age = $request->age;
        $profil->address = $request->address;
        $profil->save();    
        return redirect('/profile');
    }

    public function updateProfile(Request $request, $id){
        $request->validate([
            'age' => 'required|numeric',
            'address' =>'required'

         ]);

         $profil = Profile::find($id);
         $profil->age = $request->age;
         $profil->address = $request->address;

         $profil->update();

        return redirect('/profile')->with("success", "Profile Berhasil Di Update");
    }
}
