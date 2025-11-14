<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function ShowLogin(){
        return view ('auth.login');
    }

    public function ShowForgetPassword(){
        return view ('auth.ShowForgetPassword');
    }
}
