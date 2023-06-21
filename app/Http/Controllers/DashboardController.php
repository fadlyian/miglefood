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
        $orderDone = Order::where('status', 'Done')->get();

        // get order item by order_id
        foreach($orderDone as $od){
            $orderItemsDone[] = OrderDetail::where('order_id', $od->id)->get();
        }

        return view($viewName, [
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

