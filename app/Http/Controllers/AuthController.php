<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //login
    function login(){
        return view("auth.login");
    }
    //register
    function register(){
        return view("auth.register");
    }
}
