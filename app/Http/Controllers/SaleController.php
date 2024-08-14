<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\SaleItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class SaleController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Sale::query()
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
        return view('admin.sales.create');
    }
    public function store(Request $request)
    {
        $customer_id = $request->input('customer_id');
        // Calculate the sum of total_price
        $items = $request->input('items');
        $total_price = 0;
        foreach ($items as $item) {
            $total_price += $item['total_price'];
        }

        // dd($total_price);
        $sale = Sale::create([
            'customer_id' => $customer_id,
            'total_price' => $total_price,
            'is_active' => 1,
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
        $sale->destroy($sale->id);
        Session::flash('success', 'Sale deleted');
        return redirect()->route('sales.index');
    }
}
