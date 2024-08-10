@extends('Admin.layout.app')
@section('title', 'Update vendor')
@section('content')
    <div class="row">
        <div class="col-12 my-4 ">
            <a href="{{ url()->previous() }}" class="btn btn-outline-primary btn-sm align-items-center"><i
                    class="bx bx-arrow-back"></i>Back</a>
        </div>
    </div>
    <div class="row ">
        <h3>Vendor/<small class="text-muted">Update</small></h3>
    </div>
    <div class="container product-details shadow-lg rounded-3">
        <h4 class="product-header p-5 text-center">Update vendor details</h4>
        <form action="{{ route('vendors.update', $vendor) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row w-100 p-5">
                <form class="row g-3">
                    <div class="col-md-6 mb-3">
                        <label for="inputProductName4" class="form-label">Full name</label>
                        <input type="text"
                            class="form-control @error('full_name')
                            is-invalid
                        @enderror"
                            name="full_name" placeholder="Enter full name" value="{{ $vendor->full_name }}">
                        @error('full_name')
                            {{ $message }}
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
                            {{ $message }}
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
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="address">Address</label>
                        <textarea name="address" id="address" class="form-control">{{ $vendor->address }}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="company">Company</label>
                        <input type="text" name="company" id="company" class="form-control"
                            value="{{ $vendor->company }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="ntn">NTN</label>
                        <input type="text" name="ntn" id="ntn" class="form-control"
                            value="{{ $vendor->ntn }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="inputType" class="form-label">Status</label>
                        <select id="inputState" class="form-select " name="is_active">
                            <option selected disabled>Status</option>
                            <option value="1" {{ $vendor->is_active == 1 ? 'selected' : '' }}> Active </option>
                            <option value="0" {{ $vendor->is_active == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>

                    </div>

                    <div class="col-12 mb-3 " id="submit-action">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>

        </form>
    </div>
@endsection
