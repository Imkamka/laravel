<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
        return view('Admin.products.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
        ]);
        if ($validator->passes()) {
            $products = new Product();
            $products->name = $request->name;
            $products->description = $request->description;
            $products->type = $request->type;
            $products->save();
            return redirect()
                ->route('products.index')
                ->with('success', 'Product successfully added');
        }
        return back()
            ->withErrors($validator);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('Admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
        ]);
        if ($validator->passes()) {
            $product = Product::find($id);
            $product->name = $request->name;
            $product->description = $request->description;
            $product->type = $request->type;
            $product->save();
            return redirect()
                ->route('products.index')
                ->with('success', 'Product Updated');
        }
        return back()
            ->withErrors($validator);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->destroy($product->id);
        return redirect()->route('products.index')->with('success', 'Product Deleted');
    }
}
