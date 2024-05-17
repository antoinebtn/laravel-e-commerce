@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <a class="" href="{{ route('products') }}">Chercher un autre produit</a>
    <a class="" href="{{ route('cart.index') }}">Retour au panier</a>

    <hr>

    <h1 class="mb-4">Panier</h1>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Produit</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach(session('cart', []) as $productId => $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['price'] }} €</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>{{ $item['price'] * $item['quantity'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="text-right mt-3">
        <h5>Total de la Commande: {{ $total }} €</h5>
        <form action="{{ route('order.store')}}" method="post">
            @csrf
            <div class="col-md-12 mb-4">
                <div class="card mb-4">
                    <div class="card-header py-3">
                    <h5 class="mb-0">Adresse de livraison</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col">
                                <div data-mdb-input-init="" class="form-outline" data-mdb-input-initialized="true">
                                    <label class="form-label" for="firstname" style="margin-left: 0px;">Prénom</label>
                                    <input type="text" id="firstname" name="firstname" class="form-control">
                                <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 68.8px;"></div><div class="form-notch-trailing"></div></div></div>
                            </div>

                            <div class="col">
                                <div data-mdb-input-init="" class="form-outline" data-mdb-input-initialized="true">
                                    <label class="form-label" for="surname" style="margin-left: 0px;">Nom</label>
                                    <input type="text" id="surname" name="surname" class="form-control">
                                <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 68px;"></div><div class="form-notch-trailing"></div></div></div>
                            </div>
                        </div>

                        <div data-mdb-input-init="" class="form-outline mb-4" data-mdb-input-initialized="true">
                            <label class="form-label" for="company" style="margin-left: 0px;">Entreprise</label>
                            <input type="text" id="company" name="company" class="form-control">
                        <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 97.6px;"></div><div class="form-notch-trailing"></div></div></div>
    
                        <div data-mdb-input-init="" class="form-outline mb-4" data-mdb-input-initialized="true">
                            <label class="form-label" for="address" style="margin-left: 0px;">Adresse</label>
                            <input type="text" id="address" name="address" class="form-control">
                        <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 55.2px;"></div><div class="form-notch-trailing"></div></div></div>
                        
                        <div class="row mb-4">
                            <div class="col">
                                <div data-mdb-input-init="" class="form-outline" data-mdb-input-initialized="true">
                                    <label class="form-label" for="postal" style="margin-left: 0px;">Code Postal</label>
                                    <input type="text" id="postal" name="postal" class="form-control">
                                <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 68.8px;"></div><div class="form-notch-trailing"></div></div></div>
                            </div>
    
                            <div class="col">
                                <div data-mdb-input-init="" class="form-outline" data-mdb-input-initialized="true">
                                    <label class="form-label" for="city" style="margin-left: 0px;">Ville</label>
                                    <input type="text" id="city" name="city" class="form-control">
                                <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 68px;"></div><div class="form-notch-trailing"></div></div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <h3>Information de paiement</h3>

            <div class="card mb-4">
                <div class="card-header py-3">
                    <h5 class="mb-0">Adresse de livraison</h5>
                </div>
                <div class="card-body">

                    <div data-mdb-input-init="" class="form-outline mb-4" data-mdb-input-initialized="true">
                        <label class="form-label" for="card_number" style="margin-left: 0px;">N° de carte</label>
                        <input type="text" id="card_number" name="card_number" class="form-control">
                    <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 97.6px;"></div><div class="form-notch-trailing"></div></div></div>

                    <div class="row mb-4">
                        <div class="col">
                            <div data-mdb-input-init="" class="form-outline" data-mdb-input-initialized="true">
                                <label class="form-label" for="card_expiration_date" style="margin-left: 0px;">Date d'expiration</label>
                                <input type="text" id="card_expiration_date" name="card_expiration_date" class="form-control">
                            <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 68.8px;"></div><div class="form-notch-trailing"></div></div></div>
                        </div>

                        <div class="col">
                            <div data-mdb-input-init="" class="form-outline" data-mdb-input-initialized="true">
                                <label class="form-label" for="cryptogramme" style="margin-left: 0px;">Cryptogramme</label>
                                <input type="text" id="cryptogramme" name="cryptogramme" class="form-control">
                            <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 68px;"></div><div class="form-notch-trailing"></div></div></div>
                        </div>
                    </div>

                    <div data-mdb-input-init="" class="form-outline mb-4" data-mdb-input-initialized="true">
                        <label class="form-label" for="card_name" style="margin-left: 0px;">Nom du propriètaire de la carte</label>
                        <input type="text" id="card_name" name="card_name" class="form-control">
                    <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 55.2px;"></div><div class="form-notch-trailing"></div></div></div>
                </div>
            </div>

            <hr>

            {{-- <div class="row mb-4">
                <div class="col">
                    <div data-mdb-input-init="" class="form-outline" data-mdb-input-initialized="true">
                        <label class="form-label" for="form6Example1" style="margin-left: 0px;">Code de réduction</label>
                        <input type="text" id="form6Example1" class="form-control">
                    <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 68.8px;"></div><div class="form-notch-trailing"></div></div></div>
                </div>

                <div class="col">
                    <div data-mdb-input-init="" class="form-outline" data-mdb-input-initialized="true">
                        <label class="form-label" for="form6Example2" style="margin-left: 0px;">Code Promo</label>
                        <input type="text" id="form6Example2" class="form-control">
                    <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 68px;"></div><div class="form-notch-trailing"></div></div></div>
                </div>
            </div> --}}

            <button type="submit" class="btn btn-primary mt-2">Valider la Commande</button>
        </form>
    </div>
</div>

<!-- Bootstrap JS (jQuery is required) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
@endsection