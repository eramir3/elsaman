<x-panels.shared.panel-master>
    @section('content')

    <h4>Categories</h4>
    <br>
    <div class="row">
        <div class="col-sm-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="d-inline m-0 font-weight-bold text-primary">List</h6>
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
                                @foreach($categories as $category)
                                <tr>
                                    <td>1</td>
                                    <td>{{$category->name}}</td>
                                    <td class="d-flex">
                                        <a href="" class="btn btn-primary btn-sm mr-2"><i class="fas fa-edit"></i></a>
                                        <form method="post" action="">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                        </form>
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

    <x-panels.shared.modals.create-category></x-panels.shared.modals.create-category>

    @endsection

     

    @section('scripts')

    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('js/tools/datatables.js')}}"></script>

    @endsection
</x-panels.shared.panel-master>