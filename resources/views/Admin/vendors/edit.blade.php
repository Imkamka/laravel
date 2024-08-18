@extends('Admin.layout.app')
@section('title', 'Update vendor')
@section('content')
    <div class="row p-3">
        <h3>Vendor/<small class="text-muted">add new</small></h3>
    </div>
    <div class="container product-details p-5 shadow-lg rounded-3">
        <h4 class="product-header p-2 text-center">Add vendor details</h4>
        <form action="{{ route('vendors.store') }}" method="POST">
            @csrf
            @method('POST')
            <div class="row w-100 p-3">
                <div class="col-md-6 mb-3">
                    <label for="company">Company</label>
                    <input type="text" name="company" id="company"
                        class="form-control @error('company')
                        is-invalid
                    @enderror"
                        value="{{ $vendor->company }}" placeholder="Enter company">
                    @error('company')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="inputProductName4" class="form-label">Full name</label>
                    <input type="text"
                        class="form-control @error('full_name')
                            is-invalid
                        @enderror"
                        name="full_name" placeholder="Enter full name" value="{{ $vendor->full_name }}">
                    @error('full_name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email"
                        class="form-control @error('email')
                            is-invalid
                        @enderror"
                        name="email" id="email" placeholder="Enter email address" value="{{ $vendor->email }}">
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="number" class="form-label">Phone</label>
                    <input type="number"
                        class="form-control @error('phone')
                            is-invalid
                        @enderror"
                        name="phone" placeholder="Enter phone number" value="{{ $vendor->phone }}">
                    @error('phone')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="address">Address</label>
                    <textarea name="address" id="address"
                        class="form-control @error('address')
                            is-invalid
                        @enderror"
                        placeholder="Enter address">{{ $vendor->address }}</textarea>
                    @error('address')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="ntn">NTN</label>
                    <input type="text" name="ntn" id="ntn"
                        class="form-control @error('ntn')
                            is-invalid
                        @enderror"
                        value="{{ $vendor->ntn }}" placeholder="Enter ntn" value="{{ old('ntn') }}">
                    @error('ntn')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-12 mb-3">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>

        </form>
    </div>
@endsection
