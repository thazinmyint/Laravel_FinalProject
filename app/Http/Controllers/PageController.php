<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{
    function index() {
        $posts=Post::latest()->get();
        return view('Index',['posts'=>$posts]);
    }

    function createPost(){
        return view('user.Create');
    }

    //show post by id
    function showPostById($id){
        $post=Post::find($id);
        return view('user.ShowPost',['post'=>$post]);
    }
    //edit post
    function editPost($id){
        $updateData=Post::find($id);
        return view('user.EditPost',['updateData'=>$updateData]);
    }
    
    function userProfile(){
        return view('user/Userprofile');
    }

    
    function contactUs(){
        return view('user/ContactUs');
    }
    
    
}


