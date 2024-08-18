<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Models\PurchasePayment;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class PurchasePaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = PurchasePayment::where('purchase_payments.is_deleted', '=', 0)
                ->join('vendors', 'purchase_payments.vendor_id', '=', 'vendors.id')
                ->select('purchase_payments.*', 'vendors.company')
                ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '
                    <div class="product-actions d-flex justify-content-center ">
                    <a href="' . route('purchase-payments.show', $row) . '" class="edit btn btn-primary btn-sm"><i class="bx bx-info-circle"></i></a> &nbsp';
                    $btn .= '
                    <form action="' . route('purchase-payments.destroy', $row) . '" method="POST">
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
        return view('admin.purchases.payments.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vendors = Vendor::whereIn('id', Purchase::pluck('vendor_id'))->get();
        // return $vendors;
        return view('admin.purchases.payments.create', compact('vendors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'vendor_id' => 'required',
            'amount' => 'required',
            'description' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        PurchasePayment::create($validator->validated());
        Session::flash('success', 'Purchase payment added');
        return redirect()
            ->route('purchase-payments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(PurchasePayment $purchasePayment)
    {
        return view('admin.purchases.payments.show', compact('purchasePayment'));
    }

    /**

     * Remove the specified resource from storage.
     */
    public function destroy(PurchasePayment $purchasePayment)
    {
        $purchasePayment->is_deleted = 1;
        $purchasePayment->deleted_at = now();
        $purchasePayment->save();

        Session::flash('success', 'Purchase payment deleted');
        return redirect()->route('purchase-payments.index');
    }
}
