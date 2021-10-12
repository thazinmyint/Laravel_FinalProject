<?php

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/posts",function(){
    $posts=Post::all();
    return response()->json($posts);
}); //www.localhost:8000.com/api/posts

Route::post("/posts/create",function(){
    $post=new Post();
    $post->user_id=request('user_id');
    $post->title=request('title');
    $post->content=request('content');
    $post->image=request('image');
    $post->save();

    return "post created"; //

});