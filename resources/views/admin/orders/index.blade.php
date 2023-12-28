@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Your Orders</h1>
        @if ($orders->isEmpty())
            <p>There are no orders in your restaurant</p>
        @else
            <ul>
                @foreach ($orders as $order)
                    <li>
                        <strong>Order Id:</strong> {{ $order->id }} <br>
                        <strong>Order name:</strong> {{ $order->name }} <br>
                        <strong>Order total:</strong> {{ $order->total }} <br>

                        <!-- Elenco dei piatti dell'ordine -->
                        @if ($order->dishes->isNotEmpty())
                            <ul>
                                @foreach ($order->dishes as $dish)
                                    <li>
                                        {{ $dish->name }} - {{ $dish->description }}
                                        Quantity:{{ $dish->pivot->quantity }}
                                    </li>
                                    <!-- Mostra altri dettagli del piatto se necessario -->
                                @endforeach
                            </ul>
                        @else
                            <p>Nessun piatto associato a questo ordine.</p>
                        @endif
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
