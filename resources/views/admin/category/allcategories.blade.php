@extends('admin.layout')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        {{-- <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank" href="{{asset('admin/asset/https://datatables.net')}}">official
                DataTables documentation</a>.</p> --}}

        <!-- DataTales Example -->
            <div class="card shadow mb-4">
                @csrf
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables of Category</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="productlist" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Category</th>
                                    <th> Edit Category</th>
                                    <th> Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            <button id="{{$category->id}}" name="{{$category->name}}" data-toggle="modal" data-target="#myModal" class="btn btn-info btn-sm rounded-pill editBtn ">Edit category</button>
                                        </td>
                                        <td><a class="btn btn-danger btn-sm rounded-pill deleteBtn" href="{{route('delete_category',$category->id)}}">Delete</a></td>

                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
                <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="updateForm" action="{{route('edit/product')}}" method="POST">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title mt-0" id="myModalLabel">Update Category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input class="form-control" type="hidden" name="id" id="id">
                                        <input class="form-control" type="text" id="name" name="name" placeholder="Category name" required>


                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-info waves-effect waves-light rounded-pill">Update</button>
                                    <button type="button" class="btn btn-danger waves-effect rounded-pill" data-dismiss="modal">CLOSE</button>
                                </div>
                        </form>
                    </div><!-- /.modal-content -->
                </div>
            </div>

    </div>
    <!-- /.container-fluid -->
@endsection()
@section('script')
    <!-- Page level plugins -->
    <script src="{{ asset('admin/asset/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin asset/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('admin/asset/js/demo/datatables-demo.js') }}"></script>
    <link href="{{ asset('admin/asset/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <script>
        $(document).ready(function() {
            $('.editBtn').click(function() {

                // $('#myModal').modal('show');
                let id = this.id;

                let name = $(this).attr('name');
                // alert(name);
                $('#name').val(name);
                $('#id').val(id);
            });
        });
    </script>
@endsection()
