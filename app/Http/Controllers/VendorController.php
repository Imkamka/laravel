<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Vendor::query();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '
                    <div class="product-actions d-flex justify-content-center ">
                    <a href="' . route('vendors.edit', $row) . '" class="edit btn btn-primary btn-sm"><i class="bx bxs-edit" ></i></a>&nbsp';
                    $btn .= '
                    <form action="' . route('vendors.destroy', $row) . '" method="POST">
                      ' . csrf_field() . '
                      ' . method_field('DELETE') . '
                    <button type="submit" class="delete btn btn-danger btn-sm" id="deleteBtn"><i class="bx bx-trash-alt" ></i></button>
                   </form>&nbsp
                    ';
                    $btn .= '
                    <div class="product-actions d-flex justify-content-center ">
                    <a href="' . route('vendors.show', $row) . '" class="edit btn btn-primary btn-sm"><i class="bx bx-info-circle" ></i></a>&nbsp
                   </div>
                    ';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('Admin.vendors.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.vendors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|min:3',
            'email' => 'email|unique:vendors,email,except,id'
        ]);
        if ($validator->passes()) {

            $vendors = new Vendor();
            $vendors->full_name = $request->full_name;
            $vendors->email = $request->email;
            $vendors->phone = $request->phone;
            $vendors->address = $request->address;
            $vendors->company = $request->company;
            $vendors->ntn = $request->ntn;
            $vendors->is_active = $request->is_active;
            $vendors->save();
            Session::flash('success', 'Vendor created');
            return redirect()
                ->route('vendors.index');
        }
        return back()
            ->withErrors($validator);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $vendor = Vendor::findOrFail($id);
        return view('Admin.vendors.show', compact('vendor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $vendor = Vendor::findOrFail($id);
        return view('Admin.vendors.edit', compact('vendor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|min:3',
        ]);
        if ($validator->passes()) {
            $vendors = Vendor::findOrFail($id);
            $vendors->full_name = $request->full_name;
            $vendors->email = $request->email;
            $vendors->phone = $request->phone;
            $vendors->address = $request->address;
            $vendors->company = $request->company;
            $vendors->ntn = $request->ntn;
            $vendors->is_active = $request->is_active;
            $vendors->save();
            Session::flash('success', 'Vendor updated');

            return redirect()
                ->route('vendors.index');
        }
        return back()
            ->withErrors($validator);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vendor = Vendor::findOrFail($id);
        $vendor->destroy($vendor->id);
        Session::flash('success', 'Vendor deleted');
        return redirect()->route('vendors.index');
    }
}
