<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\User;
use Illuminate\Http\Request;

use function Symfony\Component\String\b;

class AdminController extends Controller
{
    function index(){
        return view('admin.index');
    }
    function manage_premium_users(){
        $users=User::all();
        return view('admin.manage-premium-users',['users'=>$users]);
    }
    function contact_messages(){
        $messages=ContactMessage::latest()->get();
        return view('admin.contact-messages',['messages'=>$messages]);
    }
    function deleteUser($id){
        //find that delete user in database by id
        $deletUser=User::find($id);
        // return $deletUser;

        //delete that data
        $deletUser->delete();
        //return back
        return back()->with('message','user deleted');
    }
    function editUser($id){
        $updateUser=User::find($id);
        return view('admin.edituser',['updateUser'=>$updateUser]);
    }
    function updateUser($id){
        //validation
        $validation=request()->validate([
            'name'=>'required',
            'email'=>'required',
            'isAdmin'=>'required',
            'isPremium'=>'required',
        ]);
        if($validation){
            //find that update user in database by id
            $updateUser=User::find($id);
            //override that data
            $updateUser->name=request('name');
            $updateUser->email=request('email');
            $updateUser->name=request('name');
            //update that data
            $updateUser->update();
            //return back with message
            return back()->with('message','user updated');
        }else{
            return back()->withErrors($validation);
        }
    
       
    }
}
