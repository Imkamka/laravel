<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Models\PurchasePayment;
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
            $data = Vendor::where('is_deleted', 0)->get();
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
    public function show(Request $request, string $id)
    {

        if ($request->ajax()) {
            $purchases = Purchase::where('vendor_id', $id)
                ->get()
                ->map(function ($purchase) {
                    $purchase->type = "purchase";
                    $purchase->total_price = $purchase->total_price ?? 0;
                    $purchase->created_at = $purchase->created_at;
                    $purchase->balance = 0;
                    return $purchase;
                });
            $purchasePayments = PurchasePayment::where('vendor_id', $id)
                ->get()
                ->map(function ($payment) {
                    $payment->type = 'payment';
                    $payment->amount = $payment->amount;
                    $payment->balance = 0;
                    $payment->created_at = $payment->created_at;
                    return $payment;
                });

            // Merge and sort the data by created_at
            $data = $purchases
                ->merge($purchasePayments)
                ->sortBy('created_at');
            $paid_balance = 0;
            $total_balance = 0;
            $data = $data->map(function ($item) use (&$paid_balance, &$total_balance) {
                $total_balance += $item->total_price;
                $paid_balance += $item->amount;
                // $balance = $paid_balance - $item->total_price;
                $item->totalBalance = $total_balance;
                $item->balance = $paid_balance;
                return $item;
            });

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('type', function ($row) {
                    return $row->type == 'purchase' ? 'Purchase' : 'Payment'; // Returns either 'Purchase' or 'Payment'
                })
                ->addColumn('created_at', function ($row) {
                    return $row->created_at;
                })
                ->addColumn('total_price', function ($row) {
                    return $row->total_price ?? '0.00';
                })
                ->addColumn('amount', function ($row) {
                    return $row->amount ?? '0.00';
                })
                ->addColumn('balance', function ($row) {
                    return number_format($row->balance - $row->totalBalance, 2);
                })
                ->make(true);
        }


        $vendor = Vendor::with(['purchase', 'payment'])->findOrFail($id);
        $vendorInvoice = $vendor->purchase->sum('total_price');
        $vendorPaidAmount = $vendor->payment->sum('amount');
        $vendorBalance = $vendorPaidAmount - $vendorInvoice;

        return view(
            'admin.vendors.show',
            compact(
                [
                    'vendor',
                    'vendorInvoice',
                    'vendorPaidAmount',
                    'vendorBalance'
                ]
            )
        );
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
        $vendor->is_deleted = 1;
        $vendor->deleted_at = now();
        $vendor->save();
        Session::flash('success', 'Vendor deleted');
        return redirect()->route('vendors.index');
    }
}
