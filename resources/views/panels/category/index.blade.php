<x-panels.panel-master>

@section('content')
    <div class="row">
		<div class="col-sm-6">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="d-inline m-0 font-weight-bold text-primary">Categories List</h6>
					<a class="d-inline font-weight-bold btn btn-primary btn-sm float-right" href="#" data-toggle="modal" data-target="#createCategoryModal">
						Create
					</a>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>Id</th>
									<th>Name</th>
									<th>Action</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>Id</th>
									<th>Name</th>
									<th>Action</th>
								</tr>
							</tfoot>
							<tbody>
								@foreach($categories as $key => $category)
									<tr>
										<td>{{$key + 1}}</td>
										<td>{{$category->name}}</td>
										<td class="d-flex">
											<a href="{{route('categories.update', $category->id)}}" 
												data-name="{{$category->name}}"
												class="btn btn-primary btn-sm mr-2 btn-update" 
												data-toggle="modal" 
												data-target="#updateCategoryModal">
												<i class="fas fa-edit"></i>
											</a>
											<a href="{{route('categories.delete', $category->id)}}" 
												data-name="{{$category->name}}" 
												class="btn btn-danger btn-sm btn-delete" 
												data-toggle="modal" 
												data-target="#deleteCategoryModal">
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
	<x-panels.category.create></x-panels.category.create>
	<x-panels.category.update></x-panels.category.update>
	<x-panels.category.delete></x-panels.category.delete>
@endsection
     

@section('scripts')
	<script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
	<script src="{{asset('js/tools/datatables.js')}}"></script>

	<script>
		$(document).on("click", ".btn-update", function(e) {
			e.preventDefault();
			let link = $(this).attr("href");
			let categoryName = $(this).attr("data-name");
			$('#update-category-form').attr('action', link);
			$('#update-name').val(categoryName);
		});

		$(document).on("click", ".btn-delete", function(e) {
			e.preventDefault();
			let link = $(this).attr("href");
			let categoryName = $(this).attr("data-name");
			$('#delete-category-form').attr('action', link);
			$('#delete-category-form .modal-body span').text(categoryName);
		});
	</script>
@endsection

</x-panels.panel-master>