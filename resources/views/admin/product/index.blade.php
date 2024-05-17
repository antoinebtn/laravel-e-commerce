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

    <div class="container">
        <h1>Liste des Produits</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Catégorie</th>
                    <th>Prix</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        <div class="d-flex">
                            <button type="submit" class="btn btn-info me-3">Modifier</button>
                            <form action="{{ route('admin.product.delete', $product->id ) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if ($products->hasPages())
            <ul class="pagination">
                @if($products->onFirstPage())
                    <li class="page-item disabled"><span class="page-link">Precédent</span></li>
                @else
                    <li class="page-item"><a href="{{$products->previousPageUrl()}}" class="page-link" rel="prev">Précédent</a></li>
                @endif
                @foreach($products as $product)
                    @if(is_string($product))
                    <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                    @endif
                    @if(is_array($product))
                    @foreach($element as $page => $url)
                        @if($page == $products->currentPage())
                        <li class="page-item active my-active"><span class="page-link" href="{{ $url }}">{{ $page }}</span></li>
                        @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                    @endif
                @endforeach
        @if($products->onLastPage())
        <li class="page-item disabled"><span class="page-link" >Suivant</span ></li>
        @else
        <li class="page-item"><a href="{{$products->nextPageUrl()}}" class="page-link" rel="next">Suivant</a></li>
        @endif
        </ul>
        @endif
    </div>
</div>
@endsection