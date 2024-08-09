<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Customer::query();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '
                    <div class="product-actions d-flex justify-content-center ">
                    <a href="' . route('customers.edit', $row) . '" class="edit btn btn-primary btn-sm"><i class="bx bxs-edit" ></i></a>&nbsp';
                    $btn .= '
                    <form action="' . route('customers.destroy', $row) . '" method="POST">
                      ' . csrf_field() . '
                      ' . method_field('DELETE') . '
                    <button type="submit" class="delete btn btn-danger btn-sm" id="deleteBtn"><i class="bx bx-trash-alt" ></i></button>
                   </form>&nbsp
                    ';
                    $btn .= '
                    <div class="product-actions d-flex justify-content-center ">
                    <a href="' . route('customers.show', $row) . '" class="edit btn btn-primary btn-sm"><i class="bx bx-info-circle" ></i></a>&nbsp
                   </div>
                    ';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.customers.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.customers.create');
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

            $customers = new Customer();
            $customers->full_name = $request->full_name;
            $customers->email = $request->email;
            $customers->phone = $request->phone;
            $customers->address = $request->address;
            $customers->company = $request->company;
            $customers->ntn = $request->ntn;
            $customers->is_active = $request->is_active;
            $customers->save();
            return redirect()
                ->route('customers.index')
                ->with('success', 'Customer added');
        }
        return back()
            ->withErrors($validator);
    }


    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return view('admin.customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('admin.customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $customer)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|min:3',
        ]);
        if ($validator->passes()) {
            $customers = Customer::findOrFail($customer);
            $customers->full_name = $request->full_name;
            $customers->email = $request->email;
            $customers->phone = $request->phone;
            $customers->address = $request->address;
            $customers->company = $request->company;
            $customers->ntn = $request->ntn;
            $customers->is_active = $request->is_active;
            $customers->save();
            return redirect()
                ->route('customers.index')
                ->with('success', 'Customer updated');
        }
        return back()
            ->withErrors($validator);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->destroy($customer->id);
        return redirect()->route('customers.index')->with('success', 'Customer Deleted');
    }
}
