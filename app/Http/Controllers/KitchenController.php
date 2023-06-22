<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class KitchenController extends Controller
{
    public function view(){
        //atribute
        $orders='';
        $orderItems[]=[];
        $ordersDone ='';
        $orderItemsDone[] = [];

        // get order by status = process
        $orders = Order::where('status', 'process')->get();

        // get order item by order_id
        foreach($orders as $od){
            $orderItems[] = OrderDetail::where('order_id', $od->id)->get();
        }

        // get order by status = done;
        $ordersDone = Order::where('status', 'Done')->orderBy('id', 'desc')->get();

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
        return view('dashboard.chef.dashboard', compact('orders','ordersDone','orderItems', 'orderItemsDone'));
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
