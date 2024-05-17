@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <!-- Filtres -->
    <div class="row mt-4">
        <div class="col-md-12">
            <h5>Filtrer par :</h5>
            <form action="{{ route('products.filter') }}" method="get">
                <div class="form-row row">
                    <div class="form-group col">
                        <label for="inputPrice">Prix :</label>
                        <select id="inputPrice" class="form-control" name="price">
                            <option value="asc">Croissant</option>
                            <option value="desc">Décroissant</option>
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="inputCategory">Catégorie :</label>
                        <select id="inputCategory" class="form-control" name="category">
                            <option value="">Toutes les Catégories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Appliquer</button>
            </form>
        </div>
    </div>

    <hr>

    <!-- Affichage des produits -->
    <div class="row">
        @foreach ($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                <div class="card-body">
                    <h3 class="card-title">{{ $product->name }}</h3>
                    <h5>{{ $product->category->name }}</h5>
                    <p class="card-text">Prix: {{ $product->price }} €</p>
                    <a href="{{ route("product.show", $product->id ) }}" class="btn btn-secondary">Détails</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
