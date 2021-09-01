@extends('layouts.adminlayout')

@section('content')
    <h1>contact message</h1>
<table class="table table-hover">
    <thead class="green white-text">
        <tr>
        <th scope="col">Id</th>
        <th scope="col">User Name</th>
        <th scope="col">Email</th>
        <th scope="col">Messages</th>
        <th scope="col">Update</th>
        <th scope="col">Delete</th>

        </tr>
    </thead>
    <tbody>
        <tr>
        <th scope="row">1</th>
        <td>TZM</td>
        <td>god@gmail.com</td>
        <td>Hi admin</td>
        <td><button class="btn btn-sm green white-text">update</button></td>
        <td><button class="btn btn-sm red white-text">update</button></td>
        </tr>
        
    </tbody>
</table>
@endsection