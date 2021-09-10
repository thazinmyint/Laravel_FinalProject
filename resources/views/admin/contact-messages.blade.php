<x-adminlayout>
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
    @foreach ($messages as $message)
        <tr>
        <th>{{$message->id}}</th>
        <td>{{$message->username}}</td>
        <td>{{$message->email}}</td>
        <td>{{$message->messages}}</td>
        <td><button class="btn btn-sm green white-text">update</button></td>
        <td><a class="btn btn-sm red white-text" href="{{route('deleteMessage',$message->id)}}">Delete</a></td>
        </tr>
        
    @endforeach
        
    </tbody>
</table>
</x-adminlayout>
