@extends('layouts.app')

@section('content')
<div class="container">
    @role('Admin')
    <h3>Administration</h3>
    <p><strong>Mon Nom :</strong> {{ auth()->user()->name }}</p>
    <p><strong>Mon Adresse Mail :</strong> {{ auth()->user()->email }}</p>

    <hr>

    <h3>Produits :</h3>
        <a href="{{ route('admin.product.create')}}" class="btn btn-success">Ajouter un produit</a>
        <a href="{{ route('admin.product.index')}}" class="btn btn-success">Gérer les produits</a>
    <hr>

    <h3>Mes commandes :</h3>
    @else
        <a href="">Se connecter en tant qu'admin</a>
    @endrole

</div>
@endsection
