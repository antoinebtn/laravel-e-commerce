@extends('layouts.app')

@section('content')
<div class="container">
    @role('Admin')
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h3>Administration</h3>
        <p><strong>Mon Nom :</strong> {{ auth()->user()->name }}</p>
        <p><strong>Mon Adresse Mail :</strong> {{ auth()->user()->email }}</p>

        <hr>

        <h3>Produits :</h3>
            <a href="{{ route('admin.product.create')}}" class="btn btn-success">Ajouter un produit</a>
            <a href="{{ route('admin.product.index')}}" class="btn btn-success">Gérer les produits</a>
        <hr>

        <h3>Commandes :</h3>
        <a href="{{ route('admin.order.index') }}">Gérer les commandes</a>
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
