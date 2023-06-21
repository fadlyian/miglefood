<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Consumer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // dashboard admin
    public function homeAdmin(){
        return view('dashboard.admin.dashboard', [
            'products' => Product::all(),
            'customers' => Consumer::all(),
            'orders' => Order::all(),
        ]);
    }

    // dashbboard cashier
    public function homeCashier(){
        return view('dashboard.cashier.dashboard', [
            'products' => Product::all(),
            'customers' => Consumer::all(),
            'orders' => Order::all(),
        ]);
    }
    public function orderListCashier(){
        return $this->orderList('dashboard.sales-management.order-list');
    }
    public function paymentCashier() {
        return $this->orderList('dashboard.sales-management.payment');
    }

    // dashboard chef
    public function homeChef() {
        return $this->orderList('dashboard.chef.dashboard');
    }

    // function to view order list
    public function orderList($viewName){
        // get order by status = process
        $order = Order::where('status', 'process')->get();

        // get order item by order_id
        foreach($order as $od){
            $orderItems[] = OrderDetail::where('order_id', $od->id)->get();
        }

        // get order by status = done;
        $orderDone = Order::where('status', 'done')->get();

        // get order item by order_id
        foreach($orderDone as $od){
            $orderItemsDone[] = OrderDetail::where('order_id', $od->id)->get();
        }

        // get order by status = process
        $orderNotPayed = Order::where('paymentStatus', 'not payed')->get();

        // get order item by order_id
        foreach($orderNotPayed as $onp){
            $orderItemsNotPayed[] = OrderDetail::where('order_id', $onp->id)->get();
        }

        // get order by status = done;
        $orderPayed = Order::where('paymentStatus', 'payed')->get();

        // get order item by order_id
        foreach($orderPayed as $op){
            $orderItemsPayed[] = OrderDetail::where('order_id', $op->id)->get();
        }

        return view($viewName, [
            'orders' => $order,
            'ordersDone' => $orderDone,
            'orderItems' => $orderItems,
            'orderItemsDone' => $orderItemsDone,
            'ordersNotPayed' => $orderNotPayed,
            'ordersPayed' => $orderPayed,
            'orderItemsNotPayed' => $orderItemsNotPayed,
            'orderItemsPayed' => $orderItemsPayed,
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

