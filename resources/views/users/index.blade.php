<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
</head>
<body>


<h1>Users Data</h1>
<a href="/users/create" class="btn btn-primary m-5">Add User</a>

<p>{{ session()->get('message') }}</p>
<table class="table table-striped" border="1">
    <thead>
        <th>#</th>
        <th>name</th>
        <th>email</th>
        <td>action</td>
    </thead>
    
    <tbody>
        @foreach($users as $index=>$user)
            <tr @if($loop->even) style="background-color: gray;" @endif>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="/users/{{ $user->id }}/show">show</a>
                    <a href="/users/{{ $user->id }}/edit">edit</a>
                    <a href="/users/{{ $user->id }}/delete">delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>

</table>

</body>
</html>
