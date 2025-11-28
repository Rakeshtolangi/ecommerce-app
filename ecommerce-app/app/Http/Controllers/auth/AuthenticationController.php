<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function ShowLogin(){
        return view ('auth.login');
    }

    public function login(Request $request){
        try{
            $data = $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:6',
            ]);

            if(Auth::attempt($data)){
                $request->session()->regenerate();
                return redirect()->intended('/admin')->with
                ('success','Login Successfully');
            }

            return back()->withErrors([
                'email' => 'The provided credentials do not
                match our records.',
                'password' =>'The password must be 8 characters long',
            ])->onlyInput('email');

        }catch(\Exception $e){
            return redirect()->back()->with('error','Something went wrong');
        }
    }

    public function ShowForgetPassword(){
        return view ('auth.ShowForgetPassword');
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('ShowLogin')->with('success',
        'Logout successfully');
    }


}
