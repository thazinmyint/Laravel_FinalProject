@extends('layouts.pagelayout')

@section('content')
    <div class="container"> 
        <h1 class="mt-4 mb-4">User Profile</h1>
        <!-- Default form login -->
            <form class=" border border-light p-5" action="{{route('post_userProfile')}}" method="post"
            enctype="multipart/form-data">
            @csrf
            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">
                    {{session('error')}}
                </div>
            @endif
            
            <label for="">UserName</label>
            <input type="text" id="defaultLoginFormEmail" class="form-control mb-4" name="name"
            value="{{auth()->user()->name}}">

            <label for="">Email</label>
            <input type="email" id="defaultLoginFormEmail" class="form-control mb-4" name="email"
            value="{{auth()->user()->email}}">

            <label for="">Photo</label>
            <input type="file" id="defaultLoginFormPassword" class="form-control mb-4" name="image">
            <img src="{{asset('images/profiles/'.auth()->user()->image)}}" width="200px" height="200px"><br>

            <label for="">Old password</label>
            <input type="password" id="defaultLoginFormEmail" class="form-control mb-4" name="old_password">

            <label for="">New password</label>
            <input type="password" id="defaultLoginFormEmail" class="form-control mb-4" name="new_password">

            <!-- Add Post button -->
            <button class="btn btn-info btn-block my-4" type="submit">Update Profile</button>

            </form>
    <!-- Default form login -->
    </div>
@endsection