<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        // dd($credentials);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/index');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function signup(Request $request)
    {
        $credentials = $request->validate([
            'name'=>['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
            
        ]);
        
        User::create([
           
            'name'=>$credentials['name'],
            'email'=>$credentials['email'],
            'password'=>Hash::make($credentials['password']),

           
            

        ]);
        return redirect()->intended('/login');
    }

    public function logout(Request $request){
        Auth::logout();
        
        // $request->session()->invalidate();
        // // $request->session()->regenerateToken();
        // // dd('hello');
        // return \redirect()->to("/login");
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();
     
        return redirect('/login');
        }

        public function login(){
            // dd(Auth::check());
            if(Auth::check()){
                return \redirect()->to('/');
            }
            // dd('hello');

            return view('/login');
        }
    
}
