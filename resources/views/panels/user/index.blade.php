<x-panels.panel-master>

@section('content')
    <div class="row">
		<div class="col-sm-8">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="d-inline m-0 font-weight-bold text-primary">Customers List</h6>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>Id</th>
									<th>Name</th>
									<th>Email</th>
									<th>Action</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>Id</th>
									<th>Name</th>
									<th>Email</th>
									<th>Action</th>
								</tr>
							</tfoot>
							<tbody>
								@foreach($users as $key => $user)
									<tr>
										<td>{{$key + 1}}</td>
										<td>{{$user->name}}</td>
											<td>{{$user->email}}</td>
										<td class="d-flex">
											<a href="{{route('users.update', $user->hashId)}}" 
												data-name="{{$user->name}}"
												data-email="{{$user->email}}"
												class="btn btn-primary btn-sm mr-2 btn-update" 
												data-toggle="modal" 
												data-target="#updateUserModal">
												<i class="fas fa-edit"></i>
											</a>
											<a href="{{route('users.delete', $user->hashId)}}" 
												data-name="{{$user->name}}" 
												class="btn btn-danger btn-sm btn-delete" 
												data-toggle="modal" 
												data-target="#deleteUserModal">
												<i class="fas fa-trash-alt"></i>
											</a>
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
@endsection

@section('modal')
	<x-panels.user.edit></x-panels.user.edit>
	<x-panels.user.delete></x-panels.user.delete>
@endsection
     

@section('scripts')
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('js/tools/datatables.js')}}"></script>

    <script>
      $(document).on("click", ".btn-update", function(e) {
          e.preventDefault();
          let link = $(this).attr("href");
          let userName = $(this).attr("data-name");
          let userEmail = $(this).attr("data-email");
          $('#update-user-form').attr('action', link);
          $('#update-name').val(userName);
          $('#update-email').val(userEmail);
      });

      $(document).on("click", ".btn-delete", function(e) {
          e.preventDefault();
          let link = $(this).attr("href");
          let userName = $(this).attr("data-name");
          $('#delete-user-form').attr('action', link);
          $('#delete-user-form .modal-body span').text(userName);
      });
    </script>
@endsection

</x-panels.panel-master>