@extends('layouts.app')

@section('content')
<div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <img src="https://via.placeholder.com/400" class="img-fluid" alt="Image du Produit">
            </div>
            <div class="col-md-6">
                <h2>{{ $product->name}}</h2>
                <h3>{{ $product->category->name}}</h3>
                <p>{{ $product->description }}</p>
                <p>Prix: {{ $product->price}} €</p>
                <form action="{{ route('cart.add') }}" method="post">
                    @csrf
                <div class="form-group">
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <label for="quantity">Quantité :</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="1" min="1">
                </div>
                <button type="submit" class="btn btn-primary mt-3">Ajouter au Panier</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection