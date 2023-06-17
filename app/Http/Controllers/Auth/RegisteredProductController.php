<?php

namespace App\Http\Controllers\Auth;

use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisteredProductController extends Controller {
    public function create(): View
    {
        return view('dashboard.admin.menu.add-menu');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function store(Request $request) {
        $request->validate([
            'category' => ['required', 'int'],
            'name' => ['required', 'string', 'max:255'],
            'stock' => ['required', 'int'],
            'price' => ['required', 'int'],
            'image' => ['required', 'string', 'max:255'],
        ]);

        $product = Product::create([
            'category' => $request->category,
            'name' => $request->name,
            'stock' => $request->stock,
            'price' => $request->price,
            'image' => $request->image,
        ]);

        return redirect()->route('menu.list-menu');
    }
}
