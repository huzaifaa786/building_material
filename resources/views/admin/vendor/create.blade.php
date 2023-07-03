@extends('admin.layout')
@section('content')
    <h1 class="text-center">Create Vendor</h1>
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-body">
                    <form method="post" action="{{ route('admin.vendor.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                id="name" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="emailAddress" class="form-label">Email Address:</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                id="emailAddress" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" id="password" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address:</label>
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                                id="address" required>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phoneNumber" class="form-label">Phone Number:</label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                id="phoneNumber" required>
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="Vendor lat" class="form-label">Vendor lat:</label>
                            <input type="text" name="lat" class="form-control @error('lat') is-invalid @enderror"
                                id="vendor lat" required>
                                @error('lat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="Vendor long" class="form-label">Vendor lng:</label>
                            <input type="text" name="lng" class="form-control @error('lng') is-invalid @enderror"
                                id="vendor lat" required>
                                @error('lng')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-primary btn-user rounded-pill">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
