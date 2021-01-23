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
                                <input id="name" type="text" class="form-control" name="name" required autofocus>
                            </div>
                            <div class="col-md-4">
                                <label for="code" class="col-md-6 col-form-label">{{ __('Code') }}</label>
                                <input id="code" type="text" class="form-control" name="code" required autofocus>
                            </div>
                            <div class="col-md-4">
                                <label for="quantity" class="col-md-6 col-form-label">{{ __('Quantity') }}</label>
                                <input id="quantity" type="number" min="0" class="form-control" name="quantity" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="price" class="col-md-6 col-form-label">{{ __('Price') }}</label>
                                <input id="price" type="number" step="0.01" class="form-control" name="price" required autofocus>
                            </div>
                            <div class="col-md-4">
                                <label for="size" class="col-md-6 col-form-label">{{ __('Size') }}</label>
                                <input id="size" type="text" class="form-control" name="size" required autofocus>
                            </div>
                            <div class="col-md-4">
                                <label for="category" class="col-md-6 col-form-label">{{ __('Category') }}</label>
                                <select class="form-control" id="category" name="category_id">
                                    <option hidden>Choose a Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->hashid}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="description" class="col-md-6 col-form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="15"></textarea>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="main_image">Main Image</label>
                                <input type="file" class="form-control-file" id="main_image" name="main_image">
                            </div>
                            <div class="col-md-4">
                                <label for="image1">Image 1</label>
                                <input type="file" class="form-control-file" id="image1" name="images[]">
                            </div>
                            <div class="col-md-4">
                                <label for="image2">Image 2</label>
                                <input type="file" class="form-control-file" id="image2" name="images[]">
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