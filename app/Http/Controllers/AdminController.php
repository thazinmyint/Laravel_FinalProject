<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index(){
        return view('admin.index');
    }
    function manage_premium_users(){
        return view('admin.manage-premium-users');
    }
    function contact_messages(){
        return view('admin.contact-messages');
    }
}
