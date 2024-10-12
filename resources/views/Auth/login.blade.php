@extends('appLayout')
@section('content')
<h1>user login</h1>

<form action="/login" method="post">
@csrf
@include('includes.formInput', [
    'id' => 'email',
    'name' => 'email',
    'type' => 'email',
    'label' => 'user email',

])

@include('includes.formInput', [
    'id' => 'password',
    'name' => 'password',
    'type' => 'password',
    'label' => 'user password',

])

<button class="btn btn-primary">login</button>
</form>
@endsection
