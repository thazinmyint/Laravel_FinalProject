<x-adminlayout>

    <h1>manage premium users</h1>
    <table class="table table-hover">
    <thead class="green white-text">
        <tr>
        <th scope="col">Id</th>
        <th scope="col">User Name</th>
        <th scope="col">Email</th>
        <th scope="col">isAdmin</th>
        <th scope="col">isPremium</th>
        <th scope="col">Update</th>
        <th scope="col">Delete</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
            <th>{{$user->id}}</th>
            <td>{{$user->username}}</td>
            <td>{{$user->email}}</td>

            <td><b>{{$user->isAdmin =='0'? "FALSE":"TRUE"}}</b></td>
            <td><b>{{$user->isPremium == '0'? "FALSE":"TRUE"}}</b></td>

            <td><button class="btn btn-sm green white-text">update</button></td>
            <td><button class="btn btn-sm red white-text">update</button></td>
            </tr>
        @endforeach
        
    </tbody>
</table>
</x-adminlayout>
