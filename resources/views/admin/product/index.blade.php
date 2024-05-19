@extends('layouts.app')

@section('content')
<div class="container mt-4">
    @role('Admin')
        <div class="container">
            <h1>Liste des Produits</h1>
            <a href="{{ route('admin.product.create') }}" class="btn btn-success mb-3">Ajouter un produit</a>
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
    @else
    <a class="btn btn-danger" href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
            Se connecter en tant qu'admin
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    @endrole
</div>
@endsection
