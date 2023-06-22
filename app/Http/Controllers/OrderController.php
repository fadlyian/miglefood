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

    public function inputTable(Request $request){

        session(['table' => $request->table]);

        return redirect()->back();
    }

    public function allMenu(){
        return view('customer.page.all-menu', [
            'products' => Product::all(),
            'categories' => Category::all(),
            'session' => session('consumer'),
        ]);
    }
    public function yourOrder(){
        //atribute
        $order='';
        $orderItems=[];

        // get order by consumer_id
        $order = Order::where('consumer_id',session('consumer')->id)->orderBy('id', 'desc')->get();

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

    public function allOrder(){
        $orders = NULL;

        $orders = Order::where('status', 'process')->get();
        // return $orders;

        return view('customer.page.all-orders', compact('orders'));
    }

    public function byCategory(string $id){
        $categories = Category::all();
        $products = Product::where('category_id', $id)->get();

        return view('customer.page.all-menu-category', compact('products','categories'));
    }

}

