<html>
    <head>
        <title>View Users</title>
    </head>
    <body>
    <ul>
        @foreach($users as $user)
            <li>Name : {{$user->email}} | User ID : {{$user->user_id}} | Role: {{$user->role}}</li>
        @endforeach
    </ul>
    </body>
</html>