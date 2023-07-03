@extends('vendor.layout')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            @csrf
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Vendor Orders</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="productlist" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Products</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Loop through vendor orders and display each order --}}
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->phone }}</td>
                                    <td>{{ $order->address }}</td>
                                    <td>
                                        @foreach ($order->items as $item)
                                     
                                            {{$item->products->name}} x 1
                                            <br>
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Edit Modal -->
            <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <!-- Modal content -->
                <div class="modal-dialog">
                    <form id="updateForm" action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0" id="myModalLabel">Update Order</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input class="form-control" type="hidden" name="id" id="id">
                                    <input class="form-control" type="text" id="name" name="name"
                                        placeholder="Product name" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-info waves-effect waves-light rounded-pill">Update
                                </button>
                                <button type="button" class="btn btn-danger waves-effect rounded-pill"
                                    data-dismiss="modal">CLOSE</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Delete Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Delete Order?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-footer">
                            <form id="deleteForm" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-secondary rounded-pill"
                                    data-dismiss="modal">No</button>
                                <button type="submit" class="btn btn-danger rounded-pill">Yes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- Page level plugins -->
    <script src="{{ asset('admin/asset/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/asset/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('admin/asset/js/demo/datatables-demo.js') }}"></script>
    <link href="{{ asset('admin/asset/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <script>
        $(document).ready(function() {
            $('.editBtn').click(function() {
                let id = this.id;
                let name = $(this).attr('name');

                $('#id').val(id);
                $('#name').val(name);
            });

            $('.deleteBtn').click(function() {
                let id = $(this).data('id');
                let url = '/orders/' + id;
                $('#deleteForm').attr('action', url);
            });
        });
    </script>
@endsection
