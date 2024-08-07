<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PurchaseController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::query();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '
                    <div class="product-actions d-flex justify-content-center ">
                    <a href="' . route('products.edit', $row) . '" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn .= '
                    <form action="' . route('products.destroy', $row) . '" method="POST">
                      ' . csrf_field() . '
                      ' . method_field('DELETE') . '
                    <button type="submit" class="delete btn btn-danger btn-sm">Delete</button>
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
}
