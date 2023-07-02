@extends('admin.layout')
@section('content')
    <h1 class="text-center">Create Category</h1>
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-body">
                    <form method="post" action="{{ route('admin.category.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="categoryName" class="form-label">Category Name:</label>
                            <input type="text" name="name" class="form-control" id="categoryName" required>
                        </div>
                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-primary btn-user rounded-pill ">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection()
