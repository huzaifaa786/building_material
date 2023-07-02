@extends('vendor.layout')
@section('content')
    <div class="container-fluid">
        <div class="card" style="width: 80rem;">
            <div class="card-body shadow p-3">
                <form action="{{ route('vendor.productcreate') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="category" class="col-md-2 col-form-label">Category</label>
                        <div class="col-md-10">
                            <select class="form-control form-select-lg mb-3 rounded" name="category_id"
                                style="width: 1030px;height:35px;" aria-label=".form-select-lg example">
                                <option value=""disabled selected>Select category</option>
                                <tbody>
                                    @foreach ($categories as $cateogry)
                                        <option value="{{ $cateogry->id }}">{{ $cateogry->name }}</option>
                                    @endforeach
                                </tbody>
                            </select>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="product_name" class="col-md-2 col-form-label">Product Name</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" placeholder="Enter product name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="product_price" class="col-md-2 col-form-label">Product Price</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price"
                                name="price" placeholder="Enter product price">
                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="product_unit" class="col-md-2 col-form-label">Product Unit</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control @error('unit') is-invalid @enderror" id="unit"
                                name="unit" placeholder="Enter product unit">
                            @error('unit')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="product_stock" class="col-md-2 col-form-label">Product Stock</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control @error('stock') is-invalid @enderror" id="stock"
                                name="stock" placeholder="Enter product stock">
                            @error('stock')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="product_image" class="col-md-2 col-form-label">Product Image1</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control @error('image1') is-invalid @enderror" id="image1"
                                name="image1">
                            @error('image1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="product_image" class="col-md-2 col-form-label">Product Image2</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control @error('image2') is-invalid @enderror" id="image2"
                                name="image2">
                            @error('image2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="product_image" class="col-md-2 col-form-label">Product Image3</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control @error('image3') is-invalid @enderror" id="image3"
                                name="image3">
                            @error('image3')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="product_description" class="col-md-2 col-form-label">Product Description</label>
                        <div class="col-md-10">
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                rows="4">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="product_discount" class="col-md-2 col-form-label">Product Discount</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control @error('discount') is-invalid @enderror"
                                id="discount" name="discount" placeholder="Enter product discount"
                                value="{{ old('discount') }}">
                            @error('discount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-10"></div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary rounded-pill">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection()
