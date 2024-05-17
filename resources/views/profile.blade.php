@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Mes informations :</h3>
    <p><strong>Mon Nom :</strong> {{ auth()->user()->name }}</p>
    <p><strong>Mon Adresse Mail :</strong> {{ auth()->user()->email }}</p>

    <hr>

    <h3>Mes commandes :</h3>
</div>
@endsection
