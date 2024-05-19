@extends('layouts.app')

@section('content')
<div class="container">
    @role('Admin')
    <div class="container">
        <h1>Créer un Nouveau Produit</h1>
        {{-- <form action="{{ route('admin.products.store') }}" method="post"> --}}
        <form action="{{ route('admin.product.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Nom du Produit</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label for="price">Prix</label>
                <input type="number" class="form-control" id="price" name="price" min="0" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="category">Catégorie</label>
                <select class="form-control" id="category" name="category" required>
                    <option value="">Sélectionner une Catégorie</option>

                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach

                </select>
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
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
