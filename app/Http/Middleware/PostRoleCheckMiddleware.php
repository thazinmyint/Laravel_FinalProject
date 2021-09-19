<?php

namespace App\Http\Middleware;

use App\Models\Post;
use Closure;
use Illuminate\Http\Request;

class PostRoleCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //check current user is premium user or not
        //check current user is admin user or not
        //check that post is current user's post

        //1 post id 
        $id=request('id');//delete or update post id
        //2 (user_id or author_id)
        $authorId=Post::find($id)->user_id;
        //3 currentuserid==authorid
        // auth()->user()->id==$authorId
        //or gate
        if(auth()->user()->isPremium=='1' || auth()->user()->isAdmin=='1' || auth()->user()->id==$authorId){
            return $next($request); //delete update(post)
        }else{
            return redirect()->route('home')->with('errors','u r not premium user or admin');
        }
    }
}
