<x-panel.panel-master>

@section('content')
    <div class="row">
        <div class="col-sm-9">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="d-inline m-0 font-weight-bold text-primary">Edit Product</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('products.update', $product->hashId) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="name" class="col-md-6 col-form-label">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$product->name}}" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="code" class="col-md-6 col-form-label">{{ __('Code') }}</label>
                                <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{$product->code}}" required>
                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="quantity" class="col-md-6 col-form-label">{{ __('Quantity') }}</label>
                                <input id="quantity" type="number" min="0" class="form-control @error('quantity') is-invalid @enderror" value="{{$product->quantity}}" name="quantity" required>
                                @error('quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="price" class="col-md-6 col-form-label">{{ __('Price') }}</label>
                                <input id="price" type="number" min="0" step="0.01" class="form-control @error('price') is-invalid @enderror" value="{{$product->price}}" name="price" required>
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="size" class="col-md-6 col-form-label">{{ __('Size') }}</label>
                                <input id="size" type="text" class="form-control @error('size') is-invalid @enderror" name="size" value="{{$product->size}}" required>
                                @error('size')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="category_id" class="col-md-6 col-form-label">{{ __('Category') }}</label>
                                <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                                    @foreach($categories as $category)
                                        @if($category->id === $product->category_id)
                                            <option value="{{$category->hashId}}" selected>{{$category->name}}</option>
                                        @else
                                            <option value="{{$category->hashId}}">{{$category->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="discount_price" class="col-md-6 col-form-label">{{ __('Discount Price') }}</label>
                                <input id="discount_price" type="number" min="0" step="0.01" class="form-control @error('discount_price') is-invalid @enderror" name="discount_price" value="{{$product->discount_price}}">
                                @error('discount_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="description" class="col-md-6 col-form-label">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description"  name="description" rows="15" required>
                                    {{$product->description}}
                                </textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-sm-9">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="d-inline m-0 font-weight-bold text-primary">Edit Images</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('products.update', $product->hashId) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <tr>
                                        <td>Main Image</td>
                                        <td><img height="30" src="{{ isset($product->main_image) ? asset($product->main_image) : ''}}" alt=""></td>
                                        <td class="d-flex">
                                            <a href="{{route('products.image.update', [$product->hashId, \Config::get('constants.main_image')])}}" 
                                                class="btn btn-primary btn-sm mr-2 btn-update"
                                                data-toggle="modal" 
                                                data-target="#editImageModal"
                                                data-name="Main Image">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @for ($i = 0; $i < 5; $i++)
                                        <tr>
                                            <td>Image {{$i + 1}}</td>
                                            <td><img height="30" src="{{ isset($product->images[$i]) ? asset('storage/'.$product->images[$i]) : ''}}" alt=""></td>
                                            <td class="d-flex">
                                                @if (isset($product->images[$i]))
                                                    <a href="{{route('products.image.update', [$product->hashId, $i] )}}" 
                                                        data-toggle="modal" 
                                                        data-target="#editImageModal"
                                                        data-name="Image {{$i + 1}}"
                                                        class="btn btn-primary btn-sm mr-2 btn-update">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="{{route('products.image.delete', [$product->hashId, $i])}}"  
                                                        data-toggle="modal" 
                                                        data-target="#deleteImageModal"
                                                        data-name="Image {{$i + 1}}"
                                                        class="btn btn-danger btn-sm btn-delete">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                @else
                                                    <a href="{{route('products.image.store', [$product->hashId])}}" 
                                                        data-toggle="modal" 
                                                        data-target="#createImageModal"
                                                        class="btn btn-primary btn-sm mr-2 btn-create">
                                                        <i class="fas fa-plus"></i>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal')
	
    <x-panel.product.image.create></x-panel.product.image.create>
    <x-panel.product.image.edit></x-panel.product.image.edit>
    <x-panel.product.image.delete></x-panel.product.image.delete>

@endsection

@section('scripts')
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector:'textarea'});</script>

    <script>
        $(document).on("click", ".btn-create", function(e) {
			e.preventDefault();
			let link = $(this).attr("href");
			$('#create-image-form').attr('action', link);
		});

		$(document).on("click", ".btn-update", function(e) {
			e.preventDefault();
			let link = $(this).attr("href");
			let imageName = $(this).attr("data-name");
			$('#edit-image-form').attr('action', link);
			$('#edit-name').text(imageName);
		});

		$(document).on("click", ".btn-delete", function(e) {
			e.preventDefault();
			let link = $(this).attr("href");
			let imageName = $(this).attr("data-name");
			$('#delete-image-form').attr('action', link);
			$('#delete-name').text(imageName);
		});
	</script>


@endsection

</x-panel.panel-master>