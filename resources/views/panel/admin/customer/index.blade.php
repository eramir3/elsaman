@extends('layouts.panel-master')

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
								@foreach($customers as $key => $customer)
									<tr>
										<td>{{$key + 1}}</td>
										<td>{{$customer->name}}</td>
											<td>{{$customer->email}}</td>
										<td class="d-flex">
											<a href="{{route('customers.update', $customer->hashId)}}" 
												data-name="{{$customer->name}}"
												data-email="{{$customer->email}}"
												class="btn btn-primary btn-sm mr-2 btn-update" 
												data-toggle="modal" 
												data-target="#updateCustomerModal">
												<i class="fas fa-edit"></i>
											</a>
											<a href="{{route('customers.delete', $customer->hashId)}}" 
												data-name="{{$customer->name}}" 
												class="btn btn-danger btn-sm btn-delete" 
												data-toggle="modal" 
												data-target="#deleteCustomerModal">
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

@include('panel.admin.customer.edit')
@include('panel.admin.customer.delete')

@endsection
     

@section('scripts')
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('js/tools/datatables.js')}}"></script>

    <script>
      $(document).on("click", ".btn-update", function(e) {
          e.preventDefault();
          let link = $(this).attr("href");
          let customerName = $(this).attr("data-name");
          let customerEmail = $(this).attr("data-email");
          $('#update-customer-form').attr('action', link);
          $('#update-name').val(customerName);
          $('#update-email').val(customerEmail);
      });

      $(document).on("click", ".btn-delete", function(e) {
          e.preventDefault();
          let link = $(this).attr("href");
          let customerName = $(this).attr("data-name");
          $('#delete-customer-form').attr('action', link);
          $('#delete-customer-form .modal-body span').text(customerName);
      });
    </script>
@endsection