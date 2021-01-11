<x-admin>
@section('content')
        <h1>All Posts</h1>

        @if(Session::has('message-failed'))
          <div class="alert alert-danger">
            {{Session::get('message-failed')}}
          </div>
        @elseif(Session::has('message-success'))
          <div class="alert alert-success">
            {{Session::get('message-success')}}
          </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Posts</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Title</th>
                      <th>Image</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Id</th>
                      <th>Title</th>
                      <th>Image</th>
                      <th>Update</th>
                      <th>Delete</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>1</td>
                            <td>{{$post->title}}</td>
                            <td><img height="40" src="{{$post->post_image}}" alt=""></td>
                            <td><a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a></td>
                            <td>
                                <form method="post" action="{{route('admin.posts.destroy', $post->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                </form>
                           </td>
                      </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="d-flex">
            
          </div>
          
    @endsection

    @section('scripts')

        <!-- Page level plugins -->
        <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

        <!-- Page level custom scripts -->
        <script src="{{asset('js/demo/datatables-demo.js')}}"></script>

    @endsection

</x-admin>