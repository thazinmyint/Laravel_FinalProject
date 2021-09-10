<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    function post_contact_message(){

        //validate our data
        $validation=request()->validate([
            'username'=>'required',
            'email'=>'required',
            'message'=>'required',
        ]);
        if($validation){
        // get input data from input field
            $username=request('username');
            $email=request('email');
            $text=request('message');
            // dd($username,$email,$message);
        //save that data in database
            $message=new ContactMessage();
            $message->username=$username;
            $message->email=$email;
            $message->messages=$text;
            $message->save();
             return back()->with("message","message sent to admin");

        }else{
            return back()->withErrors($validation);
        }


    }
    function deleteMessage($id){
        //find that delete data in db
        $deleteData=ContactMessage::find($id);
        //delete that data
        $deleteData->delete();
        return back()->with('message','message deleted');

    }
}
