<x-panel.panel-master>

@section('content')
    <div class="row">
        <div class="col-sm-9">
            <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="d-inline m-0 font-weight-bold text-primary">Create Post</h6>
                        <button class="d-inline font-weight-bold btn btn-primary btn-sm float-right">
                            Submit
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="category_id" class="col-md-6 col-form-label">{{ __('Category') }}</label>
                                <select class="form-control" id="category_id" name="category_id">
                                    <option hidden>Choose a Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->hashid}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-8">
                                <label for="video" class="col-md-6 col-form-label">{{ __('Video') }}</label>
                                <input type="text" class="form-control" id="video" name="video">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-8">
                                <label for="image" class="col-md-6 col-form-label">{{ __('Image') }}</label>
                                <input type="file" class="form-control-file" id="image" name="image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="d-inline m-0 font-weight-bold text-primary">English</h6>
                    </div>
                    <div class="card-body">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="title_en" class="col-md-6 col-form-label">{{ __('Title') }}</label>
                                <input id="title_en" type="text" class="form-control @error('title_en') is-invalid @enderror" value="{{ old('title_en') }}" name="title_en" required>
                                @error('title_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="text_en" class="col-md-6 col-form-label">Text</label>
                                <textarea class="form-control" id="text_en" name="text_en" rows="15">{{ old('text_en') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="d-inline m-0 font-weight-bold text-primary">French</h6>
                    </div>
                    <div class="card-body">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="title_fr" class="col-md-6 col-form-label">{{ __('Title') }}</label>
                                <input id="title_fr" type="text" class="form-control @error('title_fr') is-invalid @enderror" value="{{ old('title_fr') }}" name="title_fr" required>
                                @error('title_fr')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="text_fr" class="col-md-6 col-form-label">Text</label>
                                <textarea class="form-control" id="text_fr" name="text_fr" rows="15">{{ old('text_fr') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="d-inline m-0 font-weight-bold text-primary">Spanish</h6>
                    </div>
                    <div class="card-body">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="title_es" class="col-md-6 col-form-label">{{ __('Title') }}</label>
                                <input id="title_es" type="text" class="form-control @error('title_es') is-invalid @enderror" value="{{ old('title_es') }}" name="title_es" required >
                                @error('title_es')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="text_es" class="col-md-6 col-form-label">Text</label>
                                <textarea class="form-control" id="text_es" name="text_es" rows="15">{{ old('text_es') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector:'textarea'});</script>
@endsection

</x-panel.panel-master>