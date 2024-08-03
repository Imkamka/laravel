<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function showPurchase()
    {
        return view('Admin.purchases');
    }
    public function showAmount()
    {
        return view('Admin.amount-receivable');
    }
}
