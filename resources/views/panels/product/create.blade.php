<x-panels.panel-master>

@section('content')
    <div class="row">
        <div class="col-sm-9">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="d-inline m-0 font-weight-bold text-primary">Create Product</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="name" class="col-md-6 col-form-label">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="code" class="col-md-6 col-form-label">{{ __('Code') }}</label>
                                <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" value="{{ old('code') }}" name="code" required>
                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="quantity" class="col-md-6 col-form-label">{{ __('Quantity') }}</label>
                                <input id="quantity" type="number" min="0" class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity') }}" name="quantity" required>
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
                                <input id="price" type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" name="price" required>
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="size" class="col-md-6 col-form-label">{{ __('Size') }}</label>
                                <input id="size" type="text" class="form-control @error('size') is-invalid @enderror" value="{{ old('size') }}" name="size" required>
                                @error('size')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="category_id" class="col-md-6 col-form-label">{{ __('Category') }}</label>
                                <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                                    <option value hidden>Choose a Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->hashId}}">{{$category->name}}</option>
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
                            <div class="col-md-12">
                                <label for="description" class="col-md-6 col-form-label">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="15">{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="main_image">Main Image</label>
                                <input type="file" class="form-control-file @error('main_image') is-invalid @enderror" id="main_image" name="main_image" required>
                                @error('main_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="image1">Image 1</label>
                                <input type="file" class="form-control-file  @error('images.0') is-invalid @enderror" id="image1" name="images[]">
                                @error('images.0')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="image2">Image 2</label>
                                <input type="file" class="form-control-file  @error('images.1') is-invalid @enderror" id="image2" name="images[]">
                                @error('images.1')
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
@endsection

@section('scripts')
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector:'textarea'});</script>
@endsection

</x-panels.panel-master>