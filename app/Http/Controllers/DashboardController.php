<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchasePayment;
use App\Models\Sale;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showHome()
    {


        //fetch all the purchases with their related payments
        $purchases = Purchase::with('vendor', 'payment')->get();
        $total_price = 0;
        $total_paid = 0;

        foreach ($purchases as $purchase) {
            $total_price += $purchase['total_price'];
            $total_paid += $purchase->payment->sum('amount'); // Sum all payments for the purchase
            $remainingAmount = $total_price - $total_paid;

            $purchase->total_paid = $total_paid;
            $purchase->remaining = $remainingAmount;
        }
        // return $total_paid;

        // fetch all the sales with their related payments
        $sales = Sale::with('customer', 'payment')->get();
        $total_sale = 0;
        $total_recieved = 0;
        foreach ($sales as $sale) {
            $total_sale += $sale['total_price'];
            $total_recieved += $sale->payment->sum('amount');
            $sale->total_recieved = $total_recieved;
            $sale->remaining_recieved = $total_sale - $sale->total_recieved;
        };

        $productCount = Product::count('name');
        return view('Admin.dashboard', compact(['purchase', 'sale', 'productCount']));
    }
}
