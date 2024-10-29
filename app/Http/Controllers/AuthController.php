<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request){
        //Registar Usuario
        $fields=$request->validate([
            //Validate
            'name'=>['required','max:255'],
            'email'=>['required','email','max:255','unique:users'],
            'password'=>['required','min:8','confirmed'],
        ]);
        //Register
        $user = User::create($fields);
        //Login
        Auth::login($user);
        //Redirect
        return redirect()->route('home');
    }

    //Login User
    public function login(Request $request){
        $fields = $request->validate([
            'email'=>['required','max:255','email'],
            'password'=>['required'],
        ]);

        //Try Login
        if(Auth::attempt($fields,$request->remember)){
            return redirect()->intended();
        }else{
            return back()->withErrors([
                'failed'=> 'The credentials do not match our records'
            ]);
        }
    }
    //Logout User
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    
}