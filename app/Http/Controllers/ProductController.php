<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $data = Product::all();

        return view('dashboard.list-menu',[
            'products' => $data,
        ]);
    }
}
