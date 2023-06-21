<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Consumer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function homeAdmin(){
        return view('dashboard.admin.dashboard', [
            'products' => Product::all(),
            'customers' => Consumer::all(),
            'orders' => Order::all(),
        ]);
    }
    public function homeCashier(){
        return view('dashboard.cashier.dashboard', [
            'products' => Product::all(),
            'customers' => Consumer::all(),
            'orders' => Order::all(),
        ]);
    }
}

