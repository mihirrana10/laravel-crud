<?php

namespace App\Http\Controllers;


use Session;
use Hash;
use App\Models\login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
   
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    
    public function signupdata (Request $request)
    {
        $res = new login;
        $res->name=$request->input('name');
        $res->email=$request->input('email');
        $res->password=Hash::make($request->input('password'));

        $res->save();
                                              
        return redirect('login');
    }

    
     public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // dd($credentials);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return redirect()->intended('index');
            }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

 
    public function edit(login $login)
    {
        //
    }

    
    public function update(Request $request, login $login)
    {
        //
    }

    public function destroy(login $login)
    {
        //
    }
}
