<div class="row">
    <div class="col-sm-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Options</th>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Attach</th>
                                <th>Detach</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Options</th>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Attach</th>
                                <th>Detach</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($roles as $role)
                            <tr>
                                <td><input type="checkbox" {{ $userContainsRole($role) ? 'checked' : '' }}></td>
                                <td>{{$role->id}}</td>
                                <td>{{$role->name}}</td>
                                <td>{{$role->slug}}</td>
                                <td>
                                    <form method="post" action="{{route('admin.users.role.attach', $user)}}">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="role" value="{{$role->id}}">
                                        <button class="btn btn-primary btn-sm" {{ $userContainsRole($role) ? 'disabled' : '' }}>Attach</button>
                                    </form>
                                </td>
                                <td>
                                    <form method="post" action="{{route('admin.users.role.detach', $user)}}">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="role" value="{{$role->id}}">
                                        <button class="btn btn-danger btn-sm" {{ !$userContainsRole($role) ? 'disabled' : '' }}>Detach</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>