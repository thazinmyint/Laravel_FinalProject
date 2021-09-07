<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //delete post
    function deletePost($id){
        // get delete post by id
        $delete_post=Post::find($id);
        //delete that post
        $delete_post->delete();
        return redirect()->route('home')->with('message','deleted');
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

    //create post
    function createPost(){
        
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
