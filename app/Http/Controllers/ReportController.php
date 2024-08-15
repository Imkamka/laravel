<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Carbon\Carbon;
use App\Models\Purchase;
use App\Models\PurchasePayment;
use App\Models\Sale;
use App\Models\SalePayment;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ReportController extends Controller
{
    public function purchasesReport(Request $request)
    {
        if ($request->ajax()) {
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');

            $query = Purchase::join('vendors', 'purchases.vendor_id', '=', 'vendors.id')
                ->select('purchases.*', 'vendors.company');

            if ($startDate && $endDate) {
                $endDate = Carbon::parse($endDate)->endOfDay();
                $query->whereBetween('purchases.created_at', [$startDate, $endDate]);
            }

            $data = $query->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->format('d-m-y H.i.s');
                })
                ->make(true);
        }
        return view('admin.reports.purchases');
    }

    public function salesReport(Request $request)
    {


        if ($request->ajax()) {

            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');

            $query = Sale::join('customers', 'sales.customer_id', '=', 'customers.id')
                ->select('sales.*', 'customers.company');


            if ($startDate && $endDate) {
                $endDate = Carbon::parse($endDate)->endOfDay();
                $query->whereBetween('sales.created_at', [$startDate, $endDate]);
            }
            $data = $query->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->format('d-m-y H.i.s');
                })
                ->make(true);
        }
        return view('admin.reports.sales');
    }

    public function paymentsReport(Request $request)
    {
        if ($request->ajax()) {

            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');

            if ($startDate && $endDate) {
                $endDate = Carbon::parse($endDate)->endOfDay();
            }

            $purchasePayment = PurchasePayment::where('is_deleted', 0)->when($startDate && $endDate, function ($query) use ($startDate, $endDate) {
                $query->whereBetween('purchase_payments.created_at', [$startDate, $endDate]);
            })->get()->map(function ($payment) {
                $payment->type = 'purchase_payment';
                // $payment->balance = -$payment->amount ?? 0;
                return $payment;
            });

            $salePayment = SalePayment::where('is_deleted', 0)->when($startDate && $endDate, function ($query) use ($startDate, $endDate) {
                $query->whereBetween('sale_payments.created_at', [$startDate, $endDate]);
            })->get()->map(function ($payment) {
                $payment->type = 'sale_payment';
                // $payment->balance = $payment->amount ?? 0;
                return $payment;
            });


            // Combine Purchase and Sale Payments
            $data = $purchasePayment->concat($salePayment)->sortBy('created_at');

            // Calculate running balance
            $balance = 0;
            $data->transform(function ($item) use (&$balance) {
                if ($item->type == 'purchase_payment') {
                    $balance -= $item->amount;  // Subtract purchase payment from balance
                } else {
                    $balance += $item->amount;  // Add sale payment to balance
                }
                $item->balance = $balance;
                return $item;
            });

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->format('d-m-y H.i.s');
                })
                ->addColumn('type', function ($row) {
                    return $row->type == 'purchase_payment'  ? 'Purchase payment' : 'Sale payment';
                })
                ->addColumn('balance', function ($row) {
                    return number_format($row->balance, 2);
                })
                ->make(true);
        }
        return view('admin.reports.payments');
    }

    public function expensesReport(Request $request)
    {


        if ($request->ajax()) {

            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');

            $query = Expense::query();


            if ($startDate && $endDate) {
                $endDate = Carbon::parse($endDate)->endOfDay();
                $query->whereBetween('expenses.created_at', [$startDate, $endDate]);
            }
            $data = $query->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->format('d-m-y H.i.s');
                })
                ->make(true);
        }
        return view('admin.reports.expenses');
    }
}
