<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class KitchenController extends Controller
{
    public function view(){
        // get order by status = process
        $order = Order::where('status', 'process')->get();

        // get order item by order_id
        foreach($order as $od){
            $orderItems[] = OrderDetail::where('order_id', $od->id)->get();
        }

        // get order by status = done;
        $orderDone = Order::where('status', 'Done')->get();

        // get order item by order_id
        foreach($orderDone as $od){
            $orderItemsDone[] = OrderDetail::where('order_id', $od->id)->get();
        }
        return view('dashboard.chef.dashboard',[
            'orders' => $order,
            'ordersDone' => $orderDone,
            'orderItems' => $orderItems,
            'orderItemsDone' => $orderItemsDone,
        ]);
    }

    public function doneOrder(string $id){
        $order = Order::updateOrCreate(
            [
                'id' => $id,
            ],
            [
                'status' => "done",
            ]
        );
        return redirect()->back();

    }
}
