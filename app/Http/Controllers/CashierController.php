<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use PDO;

class CashierController extends Controller
{
    public function view(){
        //atribute
        $ordersNotProcess=NULL;
        $orderItemsNotProcess=[];
        $ordersProcess= NULL;
        $orderItemsProcess=[];
        $ordersDone=NULL;
        $orderItemsDone=[];

        // get order by status = not process;
        $ordersNotProcess = Order::where('status', 'not process')->orderBy('id', 'desc')->get();

        // get order item by order_id
        foreach($ordersNotProcess as $od){
            $orderItemsNotProcess[] = OrderDetail::where('order_id', $od->id)->get();
        }

        // get order by status = process
        $ordersProcess = Order::where('status', 'process')->get();

        // get order item by order_id
        foreach($ordersProcess as $od){
            $orderItemsProcess[] = OrderDetail::where('order_id', $od->id)->get();
        }

        // get order by status = done;
        $ordersDone = Order::where('status', 'done')->orderBy('id', 'desc')->get();

        // get order item by order_id
        foreach($ordersDone as $od){
            $orderItemsDone[] = OrderDetail::where('order_id', $od->id)->get();
        }

        // return view('dashboard.chef.dashboard',[
        //     'orders' => $order,
        //     'ordersDone' => $orderDone,
        //     'orderItems' => $orderItems,
        //     'orderItemsDone' => $orderItemsDone,
        // ]);
        return view('dashboard.sales-management.order-list', compact('ordersNotProcess','orderItemsNotProcess','ordersProcess', 'orderItemsProcess', 'ordersDone', 'orderItemsDone'));
    }

    public function viewPayment(){
        //atribute
        $ordersNotPayed=NULL;
        $orderItemsNotPayed=[];
        $ordersPayed=NULL;
        $orderItemsPayed=[];

        // get order by paymentStatus = not payed;
        $ordersNotPayed = Order::where('paymentStatus', 'not payed')->get();

        // get order item by order_id
        foreach($ordersNotPayed as $od){
            $orderItemsNotPayed[] = OrderDetail::where('order_id', $od->id)->get();
        }

        // get order by paymentStatus = payed;
        $ordersPayed = Order::where('paymentStatus', 'payed')->orderBy('id', 'desc')->get();

        // get order item by order_id
        foreach($ordersPayed as $od){
            $orderItemsPayed[] = OrderDetail::where('order_id', $od->id)->get();
        }
        return view('dashboard.sales-management.payment', compact('ordersNotPayed', 'orderItemsNotPayed', 'ordersPayed','orderItemsPayed'));
    }

    public function donePayment(string $id){
        $order = Order::updateOrCreate(
            [
                'id' => $id,
            ],
            [
                'status' => 'process',
                'paymentStatus' => "payed",
            ]
        );
        return redirect()->back();
    }

}
