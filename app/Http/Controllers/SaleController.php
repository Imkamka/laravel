<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function showSales()
    {
        return view('Admin.sales');
    }
    public function showStock()
    {
        return view('Admin.stock-details');
    }
}
