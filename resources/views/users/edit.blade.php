<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

      <form action="{{ route('users.update', $user->id) }}" method="post" class="container">
        @csrf
        @method('put')
        <h1>edit user</h1>
        {{
        session()->get('message')

         }}
        <div class="bm-3 form-group">
            <label for="" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="{{ $user->name }}">
        </div>
        <div class="bm-3 form-group">
            <label for="" class="form-label">Email</label>
            <input type="text" class="form-control" name="email" value="{{ $user->email }}">
        </div>
        <div class="bm-3 form-group">
            <label for="" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" value="{{ $user->password }}">
        </div>


        <button class="btn btn-primary">Submit</button>

    </form>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
