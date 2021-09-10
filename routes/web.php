<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//home
Route::middleware('auth')->group(function(){
    Route::get('/',[PageController::class,'index'])->name('home');

    Route::get('/user/createPost',[PageController::class,'createPost'])->name('createPost');
    Route::get('/posts/{id}',[PageController::class,'showPostById'])->name('showPostById');
    Route::get('/posts/edit/{id}',[PageController::class,'editPost'])->name('editPost');
    Route::get('/user/userProfile',[PageController::class,'userProfile'])->name('userProfile');
    Route::get('/user/contactUs',[PageController::class,'contactUs'])->name('contactUs');

    //post
    Route::get('/posts/delete/{id}',[PostController::class,'deletePost'])->name('deletePost');
    Route::post('/posts/update/{id}',[PostController::class,'updatePost'])->name('updatePost');
    Route::post('/user/createPost',[PostController::class,'createPost'])->name('post');

    //contactus
    Route::post('/user/contactUs',[ContactUsController::class,'post_contact_message'])->name('post_contact_message');
    Route::get('/admin/contact_messages/delete/{id}',[ContactUsController::class,'deleteMessage'])->name('deleteMessage');

    
    //user
    
    Route::post('/user/userProfile',[AuthController::class,'post_userProfile'])->name('post_userProfile');


    //admin
    Route::get('/admin/index',[AdminController::class,'index'])->name('admin.home');
    Route::get('/admin/manage_premium_users',[AdminController::class,'manage_premium_users'])->name('admin.manage_premium_users');
    Route::get('/admin/contact_messages',[AdminController::class,'contact_messages'])->name('admin.contact_messages');

    //logout
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');

});

Route::middleware('guest')->group(function(){
    //authentication
    Route::get("/login",[AuthController::class,'login'])->name('login');
    Route::post("/login",[AuthController::class,'post_login'])->name('post_login');

    Route::get("/register",[AuthController::class,'register'])->name("register");
    Route::post("/register",[AuthController::class,'post_register'])->name("post_register");
});


// delete edit->get
// update create->post
// read ->get

// user->server =>post
// server->user =>get
