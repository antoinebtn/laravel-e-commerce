<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $cart = session('cart', []);
        $total = 0;

        foreach($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('cart.index', [
            'total' => $total
        ]);
    }

    public function add(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
        $product = Product::find($productId);

        $cart = session()->get('cart', []);

        if(isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity,
            ];
        }

        session(['cart' => $cart]);

        return redirect()->route('cart.index');
    }

    public function remove(Request $request)
    {
        $productId = $request->input('product_id');
        $cart = session()->get('cart', []);

        if ($cart[$productId]['quantity'] === 1) {
            unset($cart[$productId]);
        } else {
            $cart[$productId]['quantity']--;
        }


        session(['cart' => $cart]);

        return redirect()->route('cart.index');
    }

    public function removeAll(Request $request)
    {
        $productId = $request->input('product_id');
        $cart = session()->get('cart', []);

        unset($cart[$productId]);

        session(['cart' => $cart]);

        return redirect()->route('cart.index');
    }


}
