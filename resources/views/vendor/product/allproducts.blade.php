@extends('vendor.layout')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        {{-- <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                href="{{ asset('admin/asset/https://datatables.net') }}">official
                DataTables documentation</a>.</p> --}}

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            @csrf
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables of Products </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="productlist" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <td>Id</td>
                                <td> Product Name</td>
                                <td>Product Price</td>
                                <td>Product Unit</td>
                                <td>Product stock</td>
                                <td>Product Discount</td>
                                <td> Product Image1</td>
                                <td> Product Image2</td>
                                <td> Product Image3</td>
                                <td> Edit</td>
                                <td> Delete</td>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $key => $product)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->unit }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>{{ $product->discount }}</td>
                                    <td><img src="{{ asset($product->image1) }}" height="100" width="100" /></td>
                                    <td><img src="{{ asset($product->image2) }}" height="100" width="100" /></td>
                                    <td><img src="{{ asset($product->image3) }}" height="100" width="100" /></td>

                                    <td>
                                        <button id="{{ $product->id }}" name="{{ $product->name }}"
                                            price="{{ $product->price }}" unit="{{ $product->unit }}"
                                            stock="{{ $product->stock }}" discount="{{ $product->discount }}"
                                            data-toggle="modal" data-target="#myModal"
                                            class="btn btn-info btn-sm rounded-pill editBtn">Edit</button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm rounded-pill deleteBtn"
                                            data-toggle="modal" id="{{ $product->id }}"
                                            data-target="#deleteModal">Delete</button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>
            </div>
            <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <form id="updateForm" action="{{ route('product/all') }}" method="POST"enctype="multipart/form-data">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0" id="myModalLabel">Update Product</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input class="form-control" type="hidden" name="id" id="id">
                                    <input class="form-control" type="text" id="name" name="name"
                                        placeholder="Product name" required>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="price">Price</label>
                                            <input class="form-control" type="text" id="price" name="price"
                                                placeholder="Product Price" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="stock">Stock</label>
                                            <input class="form-control" type="text" id="stock" name="stock"
                                                placeholder="Product stock" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="stock">discount</label>
                                            <input class="form-control" type="text" id="discount" name="discount"
                                                placeholder="Product discount" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="image1">Image</label>
                                            <input type="file" class="form-control" id="image1" name="image1">
                                            <span style="color: red;">(Leave empty if you don't want to upload)</span>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit"
                                    class="btn btn-info waves-effect waves-light rounded-pill">Update</button>
                                <button type="button" class="btn btn-danger waves-effect rounded-pill"
                                    data-dismiss="modal">CLOSE</button>
                            </div>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div>
        </div>

    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Product?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{-- <div class="modal-body">
                            Are you sure you want to delete this product?
                        </div> --}}
                <div class="modal-footer">
                    <form method="get">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="button" class="btn btn-secondary rounded-pill" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-danger rounded-pill">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
                let id = this.id;
                let name = $(this).attr('name');
                let price = $(this).attr('price');
                let unit = $(this).attr('unit');
                let stock = $(this).attr('stock');
                let discount = $(this).attr('discount');

                $('#name').val(name);
                $('#id').val(id);
                $('#price').val(price);
                $('#unit').val(unit);
                $('#stock').val(stock);
                $('#discount').val(discount);
            });
            $('.deleteBtn').click(function() {

                let id = this.id;
                $('#deleteModal form').attr('action', '{{ route('del_product', '') }}' + '/' + id);

            });

        });
    </script>
@endsection()
