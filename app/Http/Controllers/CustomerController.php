<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Sale;
use App\Models\SalePayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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
            $data = Customer::where('is_deleted', 0)->get();
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

            Session::flash('success', 'Customer added');
            return redirect()
                ->route('customers.index');
        }
        return back()
            ->withErrors($validator);
    }


    /**
     * Display the specified resource.
     */
    public function show(Request $request, Customer $customer)
    {

        if ($request->ajax()) {
            $sales = Sale::where('customer_id', $customer->id)
                ->get()
                ->map(function ($sale) {
                    $sale->type = "sale";
                    $sale->total_price = $sale->total_price ?? 0;
                    $sale->created_at = $sale->created_at;
                    $sale->balance = 0;
                    return $sale;
                });
            $salePayments = SalePayment::where('customer_id', $customer->id)
                ->get()
                ->map(function ($payment) {
                    $payment->type = 'payment';
                    $payment->amount = $payment->amount;
                    $payment->balance = 0;
                    $payment->created_at = $payment->created_at;
                    return $payment;
                });

            // Merge and sort the data by created_at
            $data = $sales
                ->merge($salePayments)
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
                    return $row->type == 'sale' ? 'Sale' : 'Payment'; // Returns either 'Purchase' or 'Payment'
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
        $customer = Customer::with(['sale', 'salePayment'])->findOrFail($customer->id);

        $customerInvoice = $customer->sale->sum('total_price');
        $customerPaidAmount = $customer->salePayment->sum('amount');
        $customerBalance = $customerPaidAmount - $customerInvoice;

        return view(
            'admin.customers.show',
            compact(
                [
                    'customer',
                    'customerInvoice',
                    'customerPaidAmount',
                    'customerBalance'
                ]
            )
        );
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
            Session::flash('success', 'Customer updated');

            return redirect()
                ->route('customers.index');
        }
        return back()
            ->withErrors($validator);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->is_deleted = 1;
        $customer->deleted_at = now();
        $customer->save();
        Session::flash('success', 'Customer deleted');
        return redirect()->route('customers.index');
    }
}
