@extends('Admin.layout.app')
@section('title', 'Purchases')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-auto me-auto mb-3">
                <h3 class="page-title">
                    Purchase Cart
                </h3>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-3">
                <div class="card shadow" id="productCard">
                    <div class="card-body p-4">
                        <div class="row mb-3">
                            <form id="searchForm" autocomplete="off">
                                <div class="col-12">
                                    <input type="text" placeholder="Search Product" name="query"
                                        id="productSearchInput" class="form-control w-100">
                                    <div id="searchResults">
                                    </div>
                                </div>
                            </form>

                        </div>
                        <h5 class="card-title"><strong>Shopping Cart</strong></h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary text-end">3 items</h6>
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-bordered ">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                            <td>@mdo</td>
                                            <td>@mdo</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-3">
                <div class="card shadow" id="vendorCard">
                    <div class="card-body p-4">
                        <div class="row mb-3">
                            <div class="col-12">
                                <form id="searchVendorForm" autocomplete="off">
                                    <div class="col-12">
                                        <input type="text" placeholder="Search Vendor" name="vendorQuery"
                                            id="vendorSearchInput" class="form-control w-100">
                                        <div id="searchVendorResults">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <h5 class="card-title"><strong>Summary</strong></h5>
                        <hr>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <hr>
                        <div class="row">
                            <div class="col-auto me-auto">
                                TOTAL PRICE
                            </div>
                            <div class="col-auto">
                                Rs. 0.00
                            </div>
                            <div class="col-12 mt-3 text-center" id="check-out-purchase">
                                <button class="btn btn-sm btn-primary btn-block">Check out</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
