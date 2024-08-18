<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Customer;
use App\Models\SalePayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class SalePaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = SalePayment::where('sale_payments.is_deleted', 0)
                ->join('customers', 'sale_payments.customer_id', '=', 'customers.id')
                ->select('sale_payments.*', 'customers.company')
                ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '
                    <div class="product-actions d-flex justify-content-center ">
                    <a href="' . route('sale-payments.show', $row) . '" class="edit btn btn-primary btn-sm"><i class="bx bx-info-circle"></i></a> &nbsp';
                    $btn .= '
                    <form action="' . route('sale-payments.destroy', $row) . '" method="POST">
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
        return view('admin.sales.payments.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::whereIn('id', Sale::pluck('customer_id'))->get();
        // return $vendors;
        return view('admin.sales.payments.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'customer_id' => 'required',
            'amount' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        SalePayment::create($validator->validated());

        Session::flash('success', 'Sale payment created');

        return redirect()
            ->route('sale-payments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(SalePayment $salePayment)
    {
        return view('admin.sales.payments.show', compact('salePayment'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SalePayment $salePayment)
    {
        $salePayment->is_deleted = 1;
        $salePayment->deleted_at = now();
        $salePayment->save();
        Session::flash('success', 'Sale payment deleted');
        return redirect()->route('sale-payments.index');
    }
}
