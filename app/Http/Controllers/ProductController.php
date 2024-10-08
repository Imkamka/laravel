<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::where('is_deleted', '=', 0)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btnEdit = '
                    <div class="product-actions d-flex justify-content-center ">
                    <a href="' . route('products.edit', $row) . '" class="edit btn btn-primary btn-sm"><i class="bx bxs-edit" ></i></a>&nbsp';
                    $btnDel = '
                    <form action="' . route('products.destroy', $row) . '" method="POST">
                      ' . csrf_field() . '
                      ' . method_field('DELETE') . '
                    <button type="submit" class="delete btn btn-danger btn-sm" id="deleteBtn"><i class="bx bx-trash-alt" ></i></button>
                   </form>&nbsp
                    ';
                    $btnShow = '
                    <div class="product-actions d-flex justify-content-center ">
                    <a href="' . route('products.show', $row) . '" class="edit btn btn-primary btn-sm"><i class="bx bx-info-circle" ></i></a>&nbsp
                   </div>
                    ';
                    return $btnEdit . $btnDel . $btnShow;
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
            'description' => 'required',
            'type' => 'required',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // Handle image upload
        $imagePath = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('images/products', $imageName, 'public');

            // Check for duplicates
            $existingProduct = Product::where('image', $imageName)->first();
            if ($existingProduct) {
                // Delete the duplicate image file
                Storage::disk('public')->delete($existingProduct->image);
            }
        }

        // Create the product with the image path
        Product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'type' => $request->input('type'),
            'image' => $imagePath,
        ]);
        Session::flash('success', 'Product added');
        return redirect()
            ->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('Admin.products.show', compact('product'));
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
            'description' => 'required',
            'type' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $product = Product::find($id);
        $product->update($validator->validated());
        Session::flash('success', 'Product Updated');
        return redirect()
            ->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->is_deleted = 1;
        $product->deleted_at = now();

        $product->save();
        // $product->destroy($product->id);
        Session::flash('success', 'Product deleted');
        return redirect()->route('products.index');
    }
}
