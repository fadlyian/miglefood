<?php

namespace App\Http\Controllers;

use App\Models\Order;
use PDF;

class TransactionReportController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        return view('dashboard.sales-management.transaction-report', compact('transactions'));
    }

    public function generatePDF()
    {
        $orders = Order::all();

        $pdf = PDF::loadview('dashboard.sales-management.transaction-pdf',['orders'=>$orders]);
    	return $pdf->stream();
    }
}
