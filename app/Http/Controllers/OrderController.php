<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\Product;

use Auth;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $userOrders = auth()->user()->orders()->latest()->paginate(10);

        return view('order.index', [
            'orders' => $userOrders
        ]);
    }

    public function show(string $id)
    {
        $order = Order::find($id);

        return view('order.show', [
            'order' => $order
        ]);
    }

    public function create()
    {
        $cart = session('cart', []);
        $total = 0;

        // Calcul du total de la commande
        foreach($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('order.create', [
            'total' => $total
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'firstname' => 'required|string',
            'surname' => 'required|string',
            'company' => 'nullable|string',
            'address' => 'required|string',
            'postal'=> 'required|string',
            'city'=> 'required|string',
            'card_number' => 'required|string',
            'card_expiration_date' => 'required|string',
            'cryptogramme' => 'required|string',
            'card_name' => 'required|string',
        ]);

        $cart = $request->session()->get('cart', []);

        // Calculer le montant total
        $totalAmount = 0;
        foreach ($cart as $productId => $item) {
            $product = Product::findOrFail($productId);
            $totalAmount += $product->price * $item['quantity'];
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['total_amount'] = $totalAmount;

        $order = Order::create($validatedData);

        // Ajouter les produits à la commande
        foreach ($cart as $productId => $item) {
            $order->products()->attach($productId, ['quantity' => $item['quantity'], 'price' => $item['price']]);
        }

        // Vider le panier après la commande
        $request->session()->forget('cart');

        return redirect()->route('order.index')->with('success', 'Commande enregistrée');
    }
}
