@extends('layouts.app')

@section('content')
<div class="container mt-4">
    @role('Admin')
    <h1 class="mb-4">Gestion des Commandes</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom du Client</th>
                <th>Adresse</th>
                <th>Total</th>
                <th>Date de Commande</th>
                <th>Statut</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->surname }} {{ $order->firstname }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->total_amount }} €</td>
                    <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                    <td>{{ $order->status }}</td>
                    <td>
                        <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="input-group">
                                <select name="status" class="form-control">
                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>En attente</option>
                                    <option value="processed" {{ $order->status == 'processed' ? 'selected' : '' }}>Traitée</option>
                                </select>
                                <button type="submit" class="btn btn-primary ml-2">Mettre à jour</button>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
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