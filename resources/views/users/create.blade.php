@extends('appLayout')

@section('content')
<p>
    {{ session()->get('message') }}
</p>
    @include('users.includes.userForm', ['url' => '/register'])
@endsection
