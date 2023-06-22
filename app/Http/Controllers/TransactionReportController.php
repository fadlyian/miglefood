<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Order;
use App\Models\OrderDetail;

class TransactionReportController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        return view('dashboard.sales-management.transaction-report', compact('transactions'));
    }

    public function generatePDF()
    {
        // get order by status = process
        $orders = Order::where('status', 'done')
        ->where('paymentStatus', 'payed')
        ->get();

        // get order item by order_id
        foreach($orders as $od){
            $orderItems[] = OrderDetail::where('order_id', $od->id)->get();
        }

        // $orders = Order::all();

        $pdf = PDF::loadview('dashboard.sales-management.transaction-pdf',['orders'=>$orders, 'orderItems'=>$orderItems]);
    	return $pdf->stream();
        // return $pdf->download('transaction-report.pdf');
    }
}
