@extends('admin.layout')
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
                <h6 class="m-0 font-weight-bold text-primary">DataTables OF Vendor </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="productlist" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <td>Id</td>
                                <td> Vendor Name</td>
                                <td>Email Address</td>
                                <td>Address</td>
                                <td>Phone</td>
                                <td>Vendor lat</td>
                                <td>Vendor lng</td>
                                <td> Edit</td>
                                <td> Vendor Products</td>
                                <td> Delete</td>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vendors as $key => $vendor)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $vendor->name }}</td>
                                    <td>{{ $vendor->email }}</td>
                                    <td>{{ $vendor->address }}</td>
                                    <td>{{ $vendor->phone}}</td>
                                    <td>{{ $vendor->lat}}</td>
                                    <td>{{ $vendor->lng}}</td>
                                    <td>
                                        <button id="{{ $vendor->id }}" name="{{ $vendor->name }}"
                                            email="{{ $vendor->email }}" address="{{ $vendor->address }}"
                                            phone="{{ $vendor->phone }}" lat="{{$vendor->lat}}" lng="{{$vendor->lng}}"
                                            data-toggle="modal" data-target="#myModal"
                                            class="btn btn-info btn-sm rounded-pill editBtn">Edit</button>
                                    </td>
                                    <td>
                                        <a href="{{ route('vendor.products', ['id' => $vendor->id]) }}" class="btn btn-success btn-sm rounded-pill">Products</a>
                                    </td>

                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm rounded-pill deleteBtn"
                                            data-toggle="modal" id="{{ $vendor->id }}"
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
                    <form id="updateForm" action="{{ route('vendor/all') }}" method="POST"enctype="multipart/form-data">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0" id="myModalLabel">Update Vendors</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input class="form-control" type="hidden" name="id" id="id">
                                    <input class="form-control" type="text" id="name" name="name"
                                        placeholder="name" required>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="price">Email</label>
                                            <input class="form-control" type="text" id="email" name="email"
                                                placeholder="Email" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="stock">Address</label>
                                            <input class="form-control" type="text" id="address" name="address"
                                                placeholder="Address" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="stock">Phone</label>
                                            <input class="form-control" type="text" id="phone" name="phone"
                                                placeholder="Phone" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="stock">Lat</label>
                                            <input class="form-control" type="text" id="lat" name="lat"
                                                placeholder="Latitude" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="stock">Lng</label>
                                            <input class="form-control" type="text" id="lng" name="lng"
                                                placeholder="Longitiude" required>
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
                    <h5 class="modal-title" id="deleteModalLabel">Delete Vendor?</h5>
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
                let email = $(this).attr('email');
                let address = $(this).attr('address');
                let phone= $(this).attr('phone');
                let lat= $(this).attr('lat');
                let lng= $(this).attr('lng');

                $('#name').val(name);
                $('#id').val(id);
                $('#email').val(email);
                $('#address').val(address);
                $('#phone').val(phone);
                $('#lat').val(lat);
                $('#lng').val(lng);
            });
            $('.deleteBtn').click(function() {

                let id = this.id;
                $('#deleteModal form').attr('action', '{{ route('delete_vendor', '') }}' + '/' + id);

            });

        });
    </script>
@endsection()
