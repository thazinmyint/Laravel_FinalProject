@extends('layouts.pagelayout')
@section('content')
<!-- background image -->
    <header>
        
    </header>
<!-- posts -->
<div class="container">
    <h1 class="mt-3">All Posts</h1>
    <div class="row">
        @foreach ($posts as $post)
            {{-- post card --}}
        <div class="col-md-4 mt-3">
            <!-- Card -->
            <div class="card">

                <!-- Card image -->
                <img class="card-img-top" src="{{asset('images/posts/'.$post->image)}}" alt="Card image cap">
            
                <!-- Card content -->
                <div class="card-body">
            
                <!-- Title -->
                <h4 class="card-title"><a>{{$post->title}}</a></h4>
               
                <!-- Button -->
                <a href="{{route('showPostById',$post->id)}}" class="btn btn-primary">See More</a>
            
                </div>
            
            </div>
            <!-- Card -->
        </div>
        @endforeach
    </div>

</div>
@endsection
