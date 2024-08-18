@extends('Admin.layout.app')
@section('title', 'Update customer')
@section('content')
    <div class="row">
        <div class="col-12 my-4 ">
            <a href="{{ url()->previous() }}" class="btn btn-outline-primary btn-sm align-items-center"><i
                    class="bx bx-arrow-back"></i>Back</a>
        </div>
    </div>
    <div class="row ">
        <h3>Customer/<small class="text-muted">Update</small></h3>
    </div>
    <div class="container product-details">
        <h4 class="product-header p-5 text-center">Update customer details</h4>
        <form action="{{ route('customers.update', $customer) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row w-100">
                <form class="row g-3">
                    <div class="col-md-6 mb-3">
                        <label for="company" class="form-label">Company</label>
                        <input type="text"
                            class="form-control @error('company')
                            is-invalid
                        @enderror"
                            name="company" placeholder="Enter company name" value="{{ $customer->company }}">
                        @error('company')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="full_name" class="form-label">Full name</label>
                        <input type="full_name"
                            class="form-control @error('full_name')
                            is-invalid
                        @enderror"
                            name="full_name" id="full_name" placeholder="Enter full name "
                            value="{{ $customer->full_name }}">
                        @error('full_name')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email"
                            class="form-control @error('email')
                            is-invalid
                        @enderror"
                            name="email" id="email" placeholder="Enter email address" value="{{ $customer->email }}">
                        @error('email')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="number" class="form-label">Phone</label>
                        <input type="number"
                            class="form-control @error('phone')
                            is-invalid
                        @enderror"
                            name="phone" placeholder="Enter phone number" value="{{ $customer->phone }}">
                        @error('phone')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="address">Address</label>
                        <textarea name="address" id="address"
                            class="form-control  @error('address')
                            is-invalid
                        @enderror"
                            placeholder="Enter Address">{{ $customer->address }}</textarea>
                        @error('address')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="ntn">NTN</label>
                        <input type="text" name="ntn" id="ntn"
                            class="form-control  @error('ntn')
                            is-invalid
                        @enderror"
                            value="{{ $customer->ntn }}" placeholder="Enter ntn">
                        @error('ntn')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    <div class="col-12 mb-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>

        </form>
    </div>
@endsection
