<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\Vendor;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function Search(Request $request)
    {
        $query = $request->get('query');
        $results = Product::where('name', 'LIKE', "%{$query}%")->get(['id', 'name']);
        return response()->json($results);
    }
    public function vendorSearchQuery(Request $request)
    {
        $searchQuery = $request->get('vendorQuery');
        $results = Vendor::where('company', 'LIKE', "%{$searchQuery}%")->get(['id', 'company']);
        return response()->json($results);
    }
    public function purchaseSearchProduct(Request $request)
    {
        $purchaseQuery = $request->get('purchaseQuery');
        $results = PurchaseItem::whereHas('product', function ($query) use ($purchaseQuery) {
            $query->where('name', 'LIKE', "%{$purchaseQuery}%");
        })->with('product')->get();

        return response()->json($results);
    }
    public function customerSearch(Request $request)
    {
        $searchQuery = $request->get('customerQuery');
        $results = Customer::where('company', 'LIKE', "%{$searchQuery}%")->get(['id', 'company']);
        return response()->json($results);
    }
}
