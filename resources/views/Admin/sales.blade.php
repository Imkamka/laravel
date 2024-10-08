@extends('Admin.layout.app')
@section('title', 'Sales')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 mb-3">
                <h3 class="page-title">
                    Sales
                </h3>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search">
                    <button class="btn btn-primary search-btn"><i class="bx bx-search"></i></button>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-auto me-auto filter-col">
                <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group me-2" role="group" aria-label="First group">
                        <a href="" class="btn btn-outline-secondary nav-link filter-active"><i
                                class="bx bx-filter"></i>&nbsp;Filter
                            by</a>
                        <a href="" class="btn btn-outline-secondary nav-link">Type&nbsp;<i
                                class='bx bx-chevron-down'></i></a>
                        <a href="" class="btn btn-outline-secondary nav-link">Price&nbsp;<i
                                class='bx bx-chevron-down'></i>
                        </a>
                        <a href="" class="btn btn-outline-secondary nav-link"><i class="bx bx-reset"></i>&nbsp;Reset
                            Filter
                        </a>

                    </div>
                </div>
            </div>
            <div class="col-auto cart-col">
                <div class="cart-button">
                    <a href="" class="btn btn-primary btn-block"><i class='bx bx-cart-alt'></i>&nbsp;Add to
                        Cart</a>
                </div>
            </div>
        </div>
        {{-- Sales tables layout  --}}
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive shadow">
                    <table class="table table-responsive table-responsive-xl w-100">
                        <thead>
                            <tr>
                                <th scope="col" width="1%" class="bg-info text-white">&nbsp;</th>
                                <th scope="col" width="5%" class="bg-info text-white">Image</th>
                                <th scope="col" width="3%" class="bg-info text-white">Item name</th>
                                <th scope="col" width="3%" class="bg-info text-white">Type</th>
                                <th scope="col" width="5%" class="bg-info text-white">Date added</th>
                                <th scope="col" width="2%" class="bg-info text-white">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i <= 7; $i++)
                                <tr>
                                    <th scope="row">
                                        <label class="checkbox-wrap checkbox-primary">
                                            <input type="radio" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </th>
                                    <td class="d-flex align-items-center">
                                        <img src="{{ asset('assets/image/bg.jpeg') }}" alt="" width="40px"
                                            height="40px">
                                    </td>
                                    <td><span>Markotto89</span></td>

                                    <td>
                                        Cow Feed
                                    </td>
                                    <td>12 May 2024-2:00AM</td>
                                    <td>2600.00 PKR</td>

                                </tr>
                            @endfor

                        </tbody>

                    </table>
                    <div class="btn-toolbar sales-paginator my-3" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group me-2" role="group" aria-label="First group">
                            <button type="button" class="btn btn-outline-primary"><i
                                    class='bx bx-chevron-left'></i></button>
                            <button type="button" class="btn btn-outline-primary">1</button>
                            <button type="button" class="btn btn-outline-primary">2</button>
                            <button type="button" class="btn btn-outline-primary">3</button>
                            <button type="button" class="btn btn-outline-primary">4</button>
                            <button type="button" class="btn btn-outline-primary">5</button>
                            <button type="button" class="btn btn-outline-primary"><i
                                    class='bx bx-chevron-right'></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
