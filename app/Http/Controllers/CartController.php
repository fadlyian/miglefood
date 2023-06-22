<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Consumer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function viewCart()
    {
        $consumer = session('consumer');
        // $consumer = Consumer::find($consumer->id);
        $cartItems = Cart::where('consumer_id', $consumer->id)->get();

        $subTotal = 0;
        for($i=0; $i<count($cartItems); $i++){
            $subTotal += $cartItems[$i]->product->price;
        }

        $grandTotal = $subTotal + $subTotal*0.1;

        return view('customer.page.cart', [
            'consumer' => $consumer,
            'cartItems' => $cartItems,
            'subTotal' => $subTotal,
            'grandTotal' => $grandTotal,
        ]);
    }

    public function addToCart(Request $request){
        //cari product sesuai id
        $product = Product::where('id', $request->product_id)->first();
        // mengambil data session consumer
        $consumer = session('consumer');

        // create new order
        Cart::updateOrCreate(
            [
                'product_id' => $product->id,
            ],
            [
                'consumer_id' => $consumer->id,
            ]
        );

        return redirect()->back();
    }

    public function confirmOrder(Request $request){
        $consumer = session('consumer');
        // return $request;

        // Retrieve the cart items
        $cartItems = Cart::where('consumer_id', $consumer->id)->get();

        // store the order
        $order = Order::create([
            'cashier_id' => User::where('id', 4)->first()->id,
            'consumer_id' => $consumer->id,
            'status' => 'process',
            'tableNumber' => session('table'),
            'subTotal' => $request->subTotal,
            'ppn' => $request->ppn,
            'grandTotal' => $request->grandTotal,
            'paymentStatus' => 'not payed',
        ]);

        // Process the cart items and store order details
        foreach($cartItems as $cardItem){
            // retrieve product
            $product = Product::find($cardItem->product_id);
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'quantity' => $cardItem->quantity
            ]);
        }

        //clear the cart
        Cart::where('consumer_id', $consumer->id)->delete();

        return response()->redirectToRoute('your-orders');
    }

    public function removeToCart(string $id){
        Cart::where('id', $id)->delete();

        return redirect()->back();

    }
}
