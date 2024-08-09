<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class PurchaseController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Purchase::query()
                ->join('vendors', 'purchases.vendor_id', '=', 'vendors.id') // Join vendors table
                ->select('purchases.*', 'vendors.company') // Select all columns from purchases and company_name from vendors
                ->get();;
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '
                    <div class="product-actions d-flex justify-content-center ">
                    <a href="' . route('purchases.show', $row) . '" class="edit btn btn-primary btn-sm"><i class="bx bx-info-circle"></i></a> &nbsp';
                    $btn .= '
                    <form action="' . route('purchases.destroy', $row) . '" method="POST">
                      ' . csrf_field() . '
                      ' . method_field('DELETE') . '
                    <button type="submit" class="delete btn btn-danger btn-sm">
                        <i class="bx bx-trash-alt"></i>
                    </button>
                   </form>
                   </div>
                    ';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('Admin.purchases.index');
    }
    public function create()
    {
        return view('Admin.purchases.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        // Validate and get vendor and total price from the request
        $vendor_id = $request->input('vendor_id');
        foreach ($request->input('items') as $item) {
            $total_price = $item['total_price'];
        }

        // dd($total_price);
        // Create a purchase record
        $purchase = Purchase::create([
            'vendor_id' => $vendor_id,
            'total_price' => $total_price,
            'is_active' => 1,
        ]);


        // Get the purchase ID
        $purchase_id = $purchase->id;
        // Loop through each item and create purchase_items records
        foreach ($request->input('items') as $item) {
            PurchaseItem::create([
                'purchase_id' => $purchase_id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'unit_price' => $item['unit_price'],
                'total_price' => $item['total_price'],
            ]);
        }

        return redirect()->route('purchases.index')->with('success', 'Purchase completed successfully!');
    }


    public function show($id)
    {
        $purchase = Purchase::with('vendor')->findOrFail($id);
        return view('admin.purchases.show', compact('purchase'));
    }

    public function destroy($id)
    {
        $purchase = Purchase::findOrFail($id);
        $purchase->destroy($purchase->id);
        return redirect()->route('purchases.index')->with('success', 'Purchase deleted');
    }
}
