<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function home(){
        return view('customer.home', [
            'products' => Product::all(),
            'categories' => Category::all(),
            'session' => session('consumer'),
        ]);
    }

    public function yourOrder(){
        // get order by consumer_id
        $order = Order::where('consumer_id',session('consumer')->id)->get();

        // get order item by order_id
        foreach($order as $od){
            $orderItems[] = OrderDetail::where('order_id', $od->id)->get();
        }

        return view('customer.page.your-orders',[
            'consumer' => session('consumer'),
            'orders' => $order,
            'orderItems' => $orderItems,

        ]);
    }
}

