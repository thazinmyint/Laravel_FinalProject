<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    function post_register(){
       $validation=request()->validate([
            "username"=>"required",
            "email"=>"required",
            "password"=>"required ||min:8 || confirmed",
            "image"=>"required",
        ]);
        if($validation){
            //move our image file to public
           $image=request('image'); //move image file to public path
           $image_name=uniqid()."_".$image->getClientOriginalName(); //save to database 
           //klfh_1.jpg //jgds_1.jpg

            //database save to user table

           $image->move(public_path('images/profiles'),$image_name);
           $password=$validation['password'];
           $user=new User();
           $user->name=$validation['username']; 
           $user->email=$validation['email'];
           $user->password=Hash::make($password);
           $user->image=$image_name;

           //take 1 second or 2 second to save a data in database
           $user->save();
           if(Auth::attempt(['email'=>$validation['email'],'password'=>$validation['password']])){
            return redirect()->route('home');
           }
           
        }else{
            return back()->withErrors($validation);
        }
    }
    function post_login(){
        //validate our input file
           $validation=request()->validate([
                "email"=>"required",
                "password"=>"required"

           ]);
        //if validation success
        if($validation){
            // if auth is success or not
            $auth=Auth::attempt(['email'=>$validation['email'],'password'=>$validation['password']]);
            if($auth){
                //goto home page
                return redirect()->route('home');
            }else{
            // else return back with auth failed error
                return back()->with('error','Authentication failed Try Again');

            }

        }else{
            return back()->withErrors($validation);
        }
        //else
            //go back login page
    }

    function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    function post_userProfile(){
        $name=request('name');
        $email=request('email');
        $image=request('image');
        $old_password=request('old_password');
        $new_password=request('new_password');

        // dd($name,$email,$image,$old_password,$new_password);
        // if user is not select image and not change password
            //add name and email to current user's id:
        $id=auth()->user()->id;
        $current_user=User::find($id);
        $current_user->name=$name;
        $current_user->email=$email;

        if($image){
            // move file to public path
            $imageName=uniqid()."_".$image->getClientOriginalName();
            $image->move(public_path('images/profiles'),$imageName);
            //save image to current user id
            $current_user->image=$imageName;
            $current_user->update();
            return back()->with("success","image changed");
        }
        if($old_password && $new_password){
            //check user input old pw is same as current user pw in database
            if(Hash::check($old_password,$current_user->password)){
                // if same
                //let user to  change new pw
                $current_user->password=Hash::make($new_password) ;
                $current_user->update();
                return back()->with("success","password changed");
            } else{
                return back()->with("error","old password is not same");
            }
            

        }
        $current_user->update();
        return back();

    }
}
