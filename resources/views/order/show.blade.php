<!-- resources/views/orders/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Détails de la Commande #{{ $order->id }}</h1>
    
    <div class="card mb-4">
        <div class="card-header">
            <h5>Informations sur la Commande</h5>
        </div>
        <div class="card-body">
            <p><strong>Nom :</strong> {{ $order->firstname }} {{ $order->surname }}</p>
            <p><strong>Entreprise :</strong> {{ $order->company ?? 'N/A' }}</p>
            <p><strong>Adresse :</strong> {{ $order->address }}, {{ $order->postal }} {{ $order->city }}</p>
            <p><strong>Total :</strong> {{ $order->total_amount }} €</p>
            <p><strong>Date :</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h5>Produits Commandés</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Quantité</th>
                        <th>Prix Unitaire</th>
                        <th>Sous-total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->pivot->quantity }}</td>
                            <td>{{ $product->price }} €</td>
                            <td>{{ $product->price * $product->pivot->quantity }} €</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection