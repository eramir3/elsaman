<!-- Create Category Modal-->
<div class="modal fade" id="createCategoryModal" tabindex="-1" role="dialog" aria-labelledby="createCategoryModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="createCategoryModalLabel">Create Category</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
				</button>
			</div>
			<form action="{{route('categories.store')}}" method="post">
				<div class="modal-body">
					@csrf
					<div class="form-group row">
						<label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>
						<div class="col-md-6">
							<input id="name" type="text" class="form-control" name="name" required autofocus>
						</div>
					</div>
					<br>
                    <div class="form-group row">
                        <div class="col-md-12 offset-md-1">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label ml-3 mr-2" for="post">
                                    {{ __('Post') }}
                                </label>
                                <input class="form-check-input-reverse" type="checkbox" name="posts_active">
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label mr-2" for="product">
                                    {{ __('Product') }}
                                </label>
                                <input class="form-check-input-reverse" type="checkbox" name="products_active">
                            </div>
                        </div>
                    </div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
					<button class="btn btn-primary btn-sm" type="submit">
						{{ __('Submit') }}
					</button>
				</div>
			</form>
		</div>
	</div>
</div>