@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <a class="" href="{{ route('products') }}">Chercher un autre produit</a>

    <hr>

    <h1 class="mb-4">Panier</h1>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Produit</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">Action</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                <!-- Boucle pour afficher les produits du panier -->
                @foreach(session('cart', []) as $productId => $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['price'] }} €</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>
                            <div class="d-flex">
                                <form action="{{ route('cart.remove') }}" method="post" class="me-3">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $productId }}">
                                    <button type="submit" class="btn btn-sm btn-danger">-</button>
                                </form>
                                <form action="{{ route('cart.remove.all') }}" method="post" class="me-3">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $productId }}">
                                    <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                                </form>
                                <form action="{{ route('cart.add') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $productId }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="btn btn-sm btn-primary">+</button>
                                </form>
                            </div>
                        </td>
                        <td>{{ $item['price'] * $item['quantity'] }}</td>
                        <td>

                        </td>
                    </tr>
                @endforeach
                <!-- Fin de la boucle -->
            </tbody>
        </table>
    </div>
    <div class="text-right mt-3">
        <h5>Total de la Commande: {{ $total }} €</h5>

            <a href="{{ route('order.create') }}" class="btn btn-primary mt-2">Valider la Commande</a>
    </div>
</div>

<!-- Bootstrap JS (jQuery is required) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
@endsection