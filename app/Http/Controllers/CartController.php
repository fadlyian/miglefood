<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Consumer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // public function showCart(){
    //     $cart = Cart::where('order_id');

    //     return view('customer.page.cart',[
    //         'cart'
    //     ]);
    // }

    public function viewCart()
    {
        $consumer = session('consumer');
        // $consumer = Consumer::find($consumer->id);
        $cartItems = Cart::where('consumer_id', $consumer->id)->get();

        $totPrice = 0;
        for($i=0; $i<count($cartItems); $i++){
            $totPrice += $cartItems[$i]->product->price;
        }

        $grandTotal = $totPrice + $totPrice*0.1;

        // return $cartItems[2]->product;
        // return view('customer.page.cart', compact('consumer', 'cartItems'));
        return view('customer.page.cart', [
            'consumer' => $consumer,
            'cartItems' => $cartItems,
            'totPrice' => $totPrice,
            'grandTotal' => $grandTotal,
        ]);
    }

    public function addToCart(Request $request){
        //cari product sesuai id
        $product = Product::where('id', $request->product_id)->first();
        // mengambil data session consumer
        $consumer = session('consumer');

        // Retrieve the consumer's order (if exists) or create a new order
        // $order = Order::firstOrCreate(['consumer_id' => $consumer->id]);

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

    public function removeToCart(string $id){
        Cart::where('id', $id)->delete();

        return redirect()->back();

    }
}
