@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Mes commandes :</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Adresse</th>
                <th>Montant total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>
                        <a href="{{ route('order.show', $order->id) }}">
                            {{ $order->created_at->format('d/m/Y') }}
                        </a>
                    </td>
                    <td>
                        {{ $order->firstname }} {{ $order->surname }}
                    </td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->total_amount }} €</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $orders->links() }}
    </div>
</div>
@endsection
