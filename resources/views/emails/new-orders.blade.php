<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Nuevas órdenes hechas</title>
</head>
<body>
    <h1>Hola Julián, estas son las ordenes de {{ $yesterday }}</h1>
    @forelse($orders as $order)
    <div class="container">
        <div class="row">
            <div class="col-sm-10">
                <div class="header">
                    <h5>Plan comprado: ${{ $order->price }} Plan</h5>
                    <h5>Usuario: {{ $order->client }}</h5>
                    <h5>ID de orden en CoinGate: {{ $order->order_id}}</h5>
                    <h5>Hora de compra: {{ $order->created_at }}</h5>
                </div>
            </div>
        </div>
    </div>
    <hr>
    @empty
    <div class="container">
        <div class="row">
            <h2>No hubieron nuevas ordenes este día :(</h2>
        </div>
    </div>
    @endforelse
</body>
</html>