<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
}
