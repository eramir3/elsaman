<x-panel.panel-master>

@section('content')
    <div class="row">
		<div class="col-sm-6">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="d-inline m-0 font-weight-bold text-primary">Coupons List</h6>
					<a class="d-inline font-weight-bold btn btn-primary btn-sm float-right" href="#" data-toggle="modal" data-target="#createCouponModal">
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
									<th>Discount (%)</th>
									<th>Action</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>Id</th>
									<th>Name</th>
									<th>Discount (%)</th>
									<th>Action</th>
								</tr>
							</tfoot>
							<tbody>
								@foreach($coupons as $key => $coupon)
									<tr>
										<td>{{$key + 1}}</td>
										<td>{{$coupon->name}}</td>
										<td>{{$coupon->discount}}</td>
										<td class="d-flex">
											<a href="{{route('coupons.update', $coupon->hashId)}}" 
												data-name="{{$coupon->name}}"
												data-discount="{{$coupon->discount}}" 
												class="btn btn-primary btn-sm mr-2 btn-update" 
												data-toggle="modal" 
												data-target="#updateCouponModal">
												<i class="fas fa-edit"></i>
											</a>
											<a href="{{route('coupons.delete', $coupon->hashId)}}" 
												data-name="{{$coupon->name}}" 
												class="btn btn-danger btn-sm btn-delete" 
												data-toggle="modal" 
												data-target="#deleteCouponModal">
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
	<x-panel.admin.coupon.create></x-panel.admin.coupon.create>
	<x-panel.admin.coupon.edit></x-panel.admin.coupon.edit>
	<x-panel.admin.coupon.delete></x-panel.admin.coupon.delete>
@endsection
     

@section('scripts')
	<script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
	<script src="{{asset('js/tools/datatables.js')}}"></script>

	<script>
		$(document).on("click", ".btn-update", function(e) {
			e.preventDefault();
			let link = $(this).attr("href");
			let couponName = $(this).attr("data-name");
			let couponDiscount = $(this).attr("data-discount");
			$('#update-coupon-form').attr('action', link);
			$('#update-name').val(couponName);
			$('#update-discount').val(couponDiscount);
		});

		$(document).on("click", ".btn-delete", function(e) {
			e.preventDefault();
			let link = $(this).attr("href");
			let couponName = $(this).attr("data-name");
			$('#delete-coupon-form').attr('action', link);
			$('#delete-coupon-form .modal-body span').text(couponName);
		});
	</script>
@endsection

</x-panel.panel-master>