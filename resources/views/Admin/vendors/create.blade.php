@extends('Admin.layout.app')
@section('title', 'Store vendor')
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
                <form class="row g-3">
                    <div class="col-md-6 mb-3">
                        <label for="inputProductName4" class="form-label">Full name</label>
                        <input type="text"
                            class="form-control @error('full_name')
                            is-invalid
                        @enderror"
                            name="full_name" placeholder="Enter full name">
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
                            name="email" id="email" placeholder="Enter email address">
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
                            name="phone" placeholder="Enter phone number">
                        @error('phone')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="address">Address</label>
                        <textarea name="address" id="address" class="form-control">{{ old('address') }}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="company">Company</label>
                        <input type="text" name="company" id="company" class="form-control"
                            value="{{ old('company') }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="ntn">NTN</label>
                        <input type="text" name="ntn" id="ntn" class="form-control"
                            value="{{ old('ntn') }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="inputType" class="form-label">Status</label>
                        <select id="inputState" class="form-select " name="is_active">
                            <option selected disabled>Status</option>
                            <option value="1"> Active </option>
                            <option value="0">Inactive</option>
                        </select>

                    </div>

                    <div class="col-12 mb-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>

        </form>
    </div>
@endsection
