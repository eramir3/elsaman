<x-admin>

  @section('content')
  <h1>User Profile for: {{$user->name}}</h1>
  <div class="row">
        <div class="col-sm-6">
            <form method="post" action="{{route('admin.users.update', $user->id)}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
                    @error('name')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="email" value="{{$user->email}}">
                    @error('email')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                    @error('password')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password-confirmation">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password-confirmation">
                    @error('password_confirmation')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <hr>

    <x-user-roles :user="$user" :roles="$roles"></x-user-roles>
    
  @endsection  

</x-admin>