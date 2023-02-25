@extends('layouts.panel-master')

@section('content')
    <div class="row">
		<div class="col-sm-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="d-inline m-0 font-weight-bold text-primary">Posts List</h6>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>Id</th>
									<th>Title</th>
									<th>Category</th>
									<th>Action</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>Id</th>
									<th>Title</th>
									<th>Category</th>
									<th>Action</th>
								</tr>
							</tfoot>
							<tbody>
								@foreach($posts as $key => $post)
									<tr>
										<td>{{$key + 1}}</td>
                                        <td>{{$post->title_en}}</td>
										<td>{{$post->category->name}}</td>
										<td class="d-flex">
											<a href="{{route('posts.edit', $post->hashId)}}" 
												class="btn btn-primary btn-sm mr-2 btn-update">
												<i class="fas fa-edit"></i>
											</a>
											<a href="{{route('posts.delete', $post->hashId)}}" 
												data-name="{{$post->title_en}}" 
												class="btn btn-danger btn-sm btn-delete" 
												data-toggle="modal" 
												data-target="#deletePostModal">
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

@include('panel.admin.post.delete')

@endsection


@section('scripts')

	<script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
	<script src="{{asset('js/tools/datatables.js')}}"></script>

    <script>
		$(document).on("click", ".btn-delete", function(e) {
			e.preventDefault();
			let link = $(this).attr("href");
			let postName = $(this).attr("data-name");
			$('#delete-post-form').attr('action', link);
			$('#delete-post-form .modal-body span').text(postName);
		});
	</script>

@endsection