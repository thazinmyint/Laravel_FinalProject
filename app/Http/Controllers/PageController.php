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
    //update post
    function updatePost($id){
        //get input data from edit post blade
        $title=request('title');
        $image=request('image');
        $content=request('content');

        //update data in database
            // require update id
        $updateData=Post::find($id);
        $updateData->title=$title;
        $updateData->content=$content;

        //image
        if($image){
        $imageName=uniqid()."_".$image->getClientOriginalName();
        $image->move(public_path('images/posts'),$imageName);
        $updateData->image=$imageName;
        }
        $updateData->update();
        //return back
        // return back()->with('message','data updated');
        return redirect()->route('home')->with('message','data updated');
    }
    //delete post
    function deletePost($id){
        // get delete post by id
        $delete_post=Post::find($id);
        //delete that post
        $delete_post->delete();
        return redirect()->route('home')->with('message','deleted');
    }
    function userProfile(){
        return view('user/Userprofile');
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
    function contactUs(){
        return view('user/ContactUs');
    }
    function post(){
        
        $validation= request()->validate([
            'title'=>'required',
            'image'=>'required',
            'content'=>'required'
        ]);
        if($validation){
            $title=request('title');
            $image=request('image'); //file
            $content=request('content');

        // save data to database
            $post=new Post();
            $post->user_id=auth()->user()->id;
            $post->title=$title;

            //image
            $imageName=uniqid()."_".$image->getClientOriginalName();
            $image->move(public_path("images/posts/"),$imageName);
            $post->image=$imageName;
            $post->content=$content;
            $post->save();
            return redirect()->route('home')->with("message","added Post");
        }else{
            return back()->withErrors($validation);
        }
        

    }
    
}


