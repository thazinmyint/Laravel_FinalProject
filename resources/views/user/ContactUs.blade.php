@extends('layouts.pagelayout')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Contact</h1>
        <div class="row">
            <div class="col-md-6">
                <!-- map here -->
            </div>
            <div class="col-md-6">
                <!-- Default form login -->
                <form class="text-center border border-light p-5" action="#!">

                    <p class="h4 mb-4">Contact Us</p>
                    <!-- username -->
                    <input type="text" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="username">
                    <!-- Email -->
                    <input type="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail">
                    <!-- message -->
                    <textarea name="" id="" cols="30" rows="10" class="form-control mb-4" placeholder="your message"></textarea>

                    <!-- Send Message in button -->
                    <button class="btn btn-info btn-block my-4" type="submit">Send Message</button>

                </form>
                <!-- Default form login -->
            </div>
        </div>
    </div>
@endsection