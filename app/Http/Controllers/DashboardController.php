<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Expense;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\PurchasePayment;
use App\Models\Sale;
use App\Models\Vendor;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showHome()
    {
        //fetch all the purchases with their related payments
        $purchases = Purchase::with('vendor', 'payment')->where('is_deleted', 0)->get();
        $total_price = 0;
        $total_paid = 0;
        $purchase = '';
        foreach ($purchases as $purchase) {
            $total_price += $purchase['total_price'];
            $total_paid = $purchase->payment->sum('amount'); // Sum all payments for the purchase
            $remainingAmount = $total_price - $total_paid;

            $purchase->total_paid = $total_paid;
            $purchase->remaining = $remainingAmount;
        }

        // fetch all the sales with their related payments
        $sales = Sale::with('customer', 'payment')->where('is_deleted', 0)->get();
        // $purchasePayment = PurchasePayment::get('amount');

        $sale = 0;
        $total_sale = 0;
        $total_recieved = 0;
        $total_balance = 0;
        $paid_balance = $purchase->total_paid ?? 0; //paid balance for purchase

        foreach ($sales as $sale) {
            $total_sale += $sale['total_price'];  //we sell it for 500
            $total_recieved = $sale->payment->sum('amount'); //we recieved payment 0
            $sale->total_recieved = $total_recieved;
            $sale->remaining_recieved = $total_sale - $sale->total_recieved;
        };
        // return $sale->total_recieved;
        $totalRecieved = $sale->total_recieved ?? 0;
        $total_balance = $totalRecieved - $total_paid;
        // return $total_balance;

        $productCount = PurchaseItem::select('product_id')
            ->selectRaw('SUM(quantity) as total_quantity')
            ->groupBy('product_id')
            ->get();
        $total_product_count = 0;
        foreach ($productCount as $count) {
            $total_product_count += $count->total_quantity;
        }

        //vendor and customers counts
        $vendorCount = Vendor::where('is_deleted', 0)->count();
        $customerCount = Customer::where('is_deleted', 0)->count();

        $stockProducts = PurchaseItem::with('product')->get();

        //Expenses
        $expenses = Expense::where('is_deleted', 0)->get('amount');

        $total_expense = 0;
        foreach ($expenses as $expense) {
            $total_expense += $expense->amount;
        }
        // return $total_expense;
        // return $stockProducts;
        // return $products;
        return view('admin.dashboard', compact(
            [
                'purchase',
                'sale',
                'total_product_count',
                'vendorCount',
                'customerCount',
                'stockProducts',
                'total_expense',
                'total_balance'
            ]
        ));
    }
}
