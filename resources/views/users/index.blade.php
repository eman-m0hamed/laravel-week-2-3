@extends('appLayout')
@section('title')
<title>Users List</title>
@endsection
@section('content')
<h1>Users Data</h1>
<a href="/users/create" class="btn btn-primary m-5">Add User</a>


@include('users.includes.storeModal', [
    'btnText' => 'add new user',
    'btnClass' => 'btn btn-warning',
    'title' => 'Add new User',



])



<p>{{ session()->get('message') }}</p>
<table class="table table-striped" border="1">
    <thead>
        <th>#</th>
        <th>name</th>
        <th>email</th>
        <th>profile image</th>
        <td>action</td>
    </thead>

    <tbody>
        @foreach($users as $index=>$user)
            <tr @if($loop->even) style="background-color: gray;" @endif>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ asset('images/'.$user->image) }}" target="_blank">
                        <img src="{{ asset('images/'.$user->image) }}" alt="user profile" width="100px">

                    </a>
                </td>
                <td>
                    <a href="/users/{{ $user->id }}/show">show</a>
                    <a href="/users/{{ $user->id }}/edit">edit</a>
                    {{-- <a href="/users/{{ $user->id }}/delete">delete</a> --}}
                    @include('includes.confirmBtn', [
                        'btnText' => 'Delete',
                        'btnClass' => 'btn btn-transparent text-decoration-underline',
                        'title' => 'delete user',
                        'url' => "/users/$user->id/delete",
                        'id' => $user->id
                    ])
                </td>
            </tr>
        @endforeach
    </tbody>

</table>
@endsection
