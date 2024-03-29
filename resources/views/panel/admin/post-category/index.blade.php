@extends('layouts.panel-master')

@section('content')
    <div class="row">
		<div class="col-sm-6">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="d-inline m-0 font-weight-bold text-primary">Post Categories List</h6>
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
											<a href="{{route('categories.posts.update', $category->hashId)}}" 
												data-name="{{$category->name}}"
												class="btn btn-primary btn-sm mr-2 btn-update" 
												data-toggle="modal" 
												data-target="#updateCategoryModal"
												data-post="{{$category->posts_active}}"
												data-product="{{$category->products_active}}">
												<i class="fas fa-edit"></i>
											</a>
											<a href="{{route('categories.posts.delete', $category->hashId)}}" 
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

@include('panel.admin.post-category.create')
@include('panel.admin.post-category.edit')
@include('panel.admin.post-category.delete')

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
			let postCheckValue = $(this).attr("data-post") == 1 ? true : false;
			let productCheckValue = $(this).attr("data-product") == 1 ? true : false;
			$('#update-category-form').attr('action', link);
			$('#update-name').val(categoryName);
			$('#update-post').attr('checked', postCheckValue);
			$('#update-product').attr('checked', productCheckValue);
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