<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>posts</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <style>
        .active>.page-link{
            background-color: red;
        }
        </style>
</head>
<body>

<section class="container my-5">

<h1>posts Data</h1>
<a href="/posts/create" class="btn btn-primary m-5">Add post</a>

<p>{{ session()->get('message') }}</p>
<table class="table table-striped" border="1">
    <thead>
        <th>#</th>
        <th>post id</th>
        <th>name</th>
        <th>email</th>
        <th>user name</th>
        <td>action</td>
    </thead>

    <tbody>
        @foreach($posts as $index=>$post)
            <tr @if($loop->even) style="background-color: gray;" @endif>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->description }}</td>
                <td>{{ $post->user->name ?? '' }}</td>
                <td>
                    <a href="/posts/{{ $post->id }}">show</a>
                    <a href="/posts/{{ $post->id }}/edit">edit</a>
                    <a href="/posts/{{ $post->id }}/delete">delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>

</table>

{{ $posts->links() }}

</section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
