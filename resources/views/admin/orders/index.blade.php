@extends('layouts.app')

@section('content')
    <div class="wrapper-order">
        <div class="container">
            <h1>Your Orders</h1>
            @if ($orders->isEmpty())
                <p>There are no orders in your restaurant</p>
            @else
                <div class="layout-base">
                    <div class="left-section">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Dish name</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <th scope="row">{{ $order->id }}</th>
                                        <td>{{ $order->name }}</td>
                                        <td>
                                            @foreach ($order->dishes as $dish)
                                                <p>{{ $dish->name }}</p>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($order->dishes as $dish)
                                                <p>{{ $dish->pivot->quantity }}</p>
                                            @endforeach
                                        </td>
                                        <td>{{ $order->total }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="right-section">
                        <canvas id="ordersChart" width="100" height="50"></canvas>
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('ordersChart').getContext('2d');
        var chartData = @json($chartData);

        var months = [];
        var totals = [];

        chartData.forEach(function(data) {
            months.push(data.year + '-' + data.month);
            totals.push(data.total);
        });

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: months,
                datasets: [{
                    label: 'Sales by Month/Year',
                    data: totals,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)',
                        // Aggiungi altri colori se necessario
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                // Aggiungi opzioni del grafico se necessario
            }
        });
    </script>
@endsection
