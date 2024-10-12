<form action={{ $url }} method="post" class="container" enctype="multipart/form-data">
        @csrf
        @if (!empty($user))
            @method('put')
        @endif

        <h1>{{ !empty($user) ? 'Update' : 'create new' }} user</h1>
        {{ session()->get('message') }}
        @include('includes.formInput', [
            'id' => 'user-name',
            'name' => 'name',
            'label' => 'User Name',
            'type' => 'text',
        ])
        @include('includes.formInput', [
            'id' => 'user-email',
            'name' => 'email',
            'label' => 'User email',
            'type' => 'email',
        ])


        {{-- <div class="bm-3 form-group">
            <label for="" class="form-label">Email</label>
            <input type="text" class="form-control" name="email" value="{{ $user->email ?? '' }}">
        </div> --}}
        <div class="bm-3 form-group">
            <label for="" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" value="{{ $user->password ?? '' }}">
        </div>

        @include('includes.formInput', [
            'id' => 'user-profile',
            'name' => 'image',
            'label' => 'User profile image',
            'type' => 'file',
            'accept' =>'image/png, image/jpeg, image/jpg'
        ])
        <button class="btn btn-primary">Submit</button>

    </form>
