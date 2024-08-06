@extends('Admin.layout.app')
@section('title', 'Update Product')
@section('content')
    <div class="row ">
        <h3>Product Stock/<small class="text-muted">Update</small></h3>
    </div>
    <div class="container product-details">
        <h4 class="product-header p-5 text-center">Update product details</h4>
        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="row w-100">
                <form class="row g-3">
                    <div class="col-md-6 mb-3">
                        <label for="inputProductName4" class="form-label">Product name</label>
                        <input type="text"
                            class="form-control @error('name')
                            is-invalid
                        @enderror"
                            id="inputProductName4" name="name" placeholder="Enter product name"
                            value="{{ $product->name }}">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="inputDescription4" class="form-label">Description</label>
                        <input type="Description"
                            class="form-control @error('description')
                            is-invalid
                        @enderror"
                            name="description" id="inputDescription4" placeholder="Enter product description"
                            value="{{ $product->description }}">
                        @error('description')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="inputType" class="form-label">Type</label>
                        <select id="inputState"
                            class="form-select @error('type')
                            is-invalid
                        @enderror"
                            name="type">
                            <option selected disabled>Select product type</option>
                            <option value="Cash" {{ $product->type === 'Cash' ? 'selected' : '' }}> Cash </option>
                            <option value="Lator on" {{ $product->type === 'Lator on' ? 'selected' : '' }}>Later on</option>
                            <option value="COD" {{ $product->type === 'COD' ? 'selected' : '' }}>COD</option>
                        </select>
                        @error('type')
                            {{ $message }}
                        @enderror
                    </div>

                    <div class="col-12 mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>

        </form>
    </div>
@endsection
