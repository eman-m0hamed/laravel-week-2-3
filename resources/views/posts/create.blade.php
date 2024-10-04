<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>


      <form action="{{ route('posts.store') }}" method="post" class="container">
        @csrf
        <h1>create post</h1>
        {{
        session()->get('message')

         }}
         @if ($errors->any())
<ul>
    @foreach ($errors->all() as $error )
    <li>{{$error}}</li>
    @endforeach
</ul>
         @endif
        <div class="bm-3 form-group">
            <label for="" class="form-label">title</label>
            <input type="text" class="form-control" name="title" value="{{ old('title') }}" >
            @error('title')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="bm-3 form-group">
            <label for="" class="form-label">description</label>
            <input type="text" class="form-control" name="description" value="{{ old('description') }}">
             @error('description')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="bm-3 form-group">
            <label for="" class="form-label">user name</label>
            <select name="user_id" id="" class="form-control">
                <option value="">select user</option>
                @foreach ( $users as $user )
                <option value="{{ $user->id }}"  {{ (old('user_id') == $user->id)? 'selected' : null }}

                >{{ $user->name }}</option>
                @endforeach
            </select>
             @error('user_id')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>



        <button class="btn btn-primary">Submit</button>

    </form>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
