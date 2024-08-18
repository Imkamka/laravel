<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Customer;
use App\Models\Purchase;
use App\Models\SaleItem;
use App\Models\PurchaseItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class SaleController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Sale::where('sales.is_deleted', 0)
                ->join('customers', 'sales.customer_id', '=', 'customers.id')
                ->select('sales.*', 'customers.company')
                ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '
                    <div class="product-actions d-flex justify-content-center ">
                    <a href="' . route('sales.show', $row) . '" class="edit btn btn-primary btn-sm"><i class="bx bx-info-circle"></i></a> &nbsp';
                    $btn .= '
                    <form action="' . route('sales.destroy', $row) . '" method="POST">
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
        return view('admin.sales.index');
    }
    public function create()
    {
        // if (!empty(Customer::where('is_deleted', 0)->count())) {
        return view('admin.sales.create');
        // }
        // return redirect()->route('customers.create')->with('error', 'Customer is required');
    }
    public function store(Request $request)
    {
        // dd($request);
        $customer_id = $request->input('customer_id');

        // Calculate the sum of total_price
        $items = $request->input('items');
        $total_price = 0;
        foreach ($items as $item) {
            $total_price += $item['total_price'];
        }
        // return $items;
        //Validate products quantities
        foreach ($items as $item) {
            $productId =  $item['product_id'];
            $saleQty = $item['quantity'];

            //Sum the quantities in purchase items
            $availableQuantity = PurchaseItem::where('product_id', $productId)->sum('quantity');
            if ($saleQty > $availableQuantity) {
                return redirect()->back()->with(
                    'error',
                    'Quantity requested for product ID ' . $productId . ' exceeds available stock.',
                );
            }
        }
        // dd($total_price);
        $sale = Sale::create([
            'customer_id' => $customer_id,
            'total_price' => $total_price,
        ]);

        $sale_id = $sale->id;

        foreach ($request->input('items') as $item) {
            SaleItem::create([
                'sale_id' => $sale_id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'unit_price' => $item['unit_price'],
                'total_price' => $item['total_price'],
            ]);
        }


        $productId = $item['product_id'];
        $qtySold = $item['quantity'];
        //Product count items after sold
        $productItems = PurchaseItem::where('product_id', $productId)->get();

        foreach ($productItems as $item) {
            if (
                $item->quantity >= $qtySold
            ) {
                $item->quantity -= $qtySold;
                $item->save();
                break;
            } else {
                $qtySold -= $item->quantity;
                $item->quantity = 0;
                $item->save();
            }
        }

        Session::flash('success', 'Sale created');

        return redirect()->route('sales.index');
    }
    public function show($id)
    {
        $sale = Sale::with('customer')->findOrFail($id);
        return view('admin.sales.show', compact('sale'));
    }

    public function destroy($id)
    {
        $sale = Sale::findOrFail($id);
        $sale->is_deleted = 1;
        $sale->save();
        Session::flash('success', 'Sale deleted');
        return redirect()->route('sales.index');
    }
}
