@extends('layouts.app')

@section('title')
    AdicTec | Mis cuentas e inversiones
@endsection

@section('content')

<style>

.boxx {
    background: #fff;
    -webkit-border-radius: .25em;
    border-radius: .25em;
    padding: 20px;
    background: #fff;
    -webkit-box-shadow: 0 0.07em 0.125em 0 rgba(0,0,0,.15);
    box-shadow: 0 0.07em 0.125em 0 rgba(0,0,0,.15);
}

</style>

<div class="container boxx mt-3">
    <div class="row pt-4 bg-gray" >
        <div class="col-sm-12 mb-2 text-center">
            <h4 class="text-subtitle">Total inversiones actuales</h4>
            <h6 class="text-subtitle" style="font-size:1.8em; color:#009ee3">${{ $totalValue }}</h6>
        </div>
    </div>
    <div class="col-sm-12 text-center mt-3">
        <a href="{{ route('user.packs') }}" style="font-weight:bold" class="btn btn-outline-primary button-invest ">INVERTIR</a>
    </div>
</div>
<hr class="mt-5">

@if(Auth::user()->orders->count() >= 1)
<div class="container boxx" >
    <div class="row">
        <div class="col-sm-12">
            <h5 class="text-subtitle" style="color:#009ee3">Inversiones actualmente activas</h5>
        </div>
    </div>
</div>
@foreach(Auth::user()->orders->chunk(1) as $orders)
    @foreach($orders as $order)
    <div class="container boxx mt-4" >
        <div class="row">
            <div class="col-sm-10">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-subtitle" style="font-size:1.2em">${{ $order->price }} Plan</h4>
                    </div>
                    <div class="card-body">
                    <h6 class="text-subtitle" style="font-weight:bold;">Fecha y hora de compra: </h6><p>{{ $order->created_at->format('d-M-Y - H:i:s') }}</p>
                    <h6 class="text-subtitle" style="font-weight:bold">Utilidad ganadas hasta ahora: <h5 class="text-subtitle order_profit" style="color:#009ee3">${{ $order->profit }}</h5></h6>
                    </div>

                    <div class="card-ftr border bg-gray">
                        <button class="m-3 btn btn-outline-danger ml-2 border-rounded" style="font-weight:bold; border-radius:80px; width:150px" data-toggle="modal" data-target="#exampleModal">Retirar inversión</button>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Correo de notificación</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="text-descriptive text-secondary" style="font-style:italic">(Este correo será enviado a soporte para la devolución de sus inversiones y utilidades en los siguientes 5 días hábiles)</p>
                                    <form method="POST" action="{{ route('user.retire') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nombre y apellido</label>
                                            <input required name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nombre">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Correo Electrónico</label>
                                            <input required name="email" type="email" class="form-control" id="exampleInputPassword1" placeholder="Correo Electrónico">
                                            <small id="emailHelp" class="form-text text-muted">No compartiremos tu correo con nadie más.</small>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="order_id" value="{{ $order->id }}">
                                            <input type="hidden" name="user_id" value="{{ $order->user_id }}">
                                            <input type="hidden" name="order_price" value="{{ $order->price }}">
                                            <input type="hidden" name="order_client" value="{{ $order->client }}">
                                            <input type="hidden" name="order_profit" value="{{ $order->profit }}">
                                            <label for="exampleInputPassword1">Dirección de wallet</label>
                                            <input required name="btcAddress" type="text" class="form-control" id="exampleInputPassword1" placeholder="Dirección Wallet">
                                            <small id="emailHelp" class="form-text text-muted">Depositaremos tu respectivo dinero de inversión y utilidades en esta cuenta.</small>
                                        </div>
                                        <button type="submit" class="btn btn-primary justify-content-center">Enviar notificación</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endforeach
@endforeach

@else
<div class="container boxx" >
    <div class="row">
        <div class="col-sm-12">
            <h5 class="text-subtitle" style="color:#009ee3">Actualmente no tienes ninguna inversión <i style="1.8em" class="far fa-sad-tear"></i></h5>
        </div>
    </div>
</div>
<div class="container boxx mt-4" >
    <div class="row">
        <div class="col-sm-12">
            <h5>Dale click al botón <a href="{{ route('user.packs') }}"><button class="btn btn-outline-primary button-invest mr-2">INVERTIR</button></a> y conoce los planes que estás disponibles para ti.</h5>
            <h5>Si tienes dudas acerca de los procedimientos y pagos no dudes en contactarnos.</h5>
        </div>
    </div>
</div>
@endif

{{-- Inversiones que han sido retiradas. --}}
@forelse(Auth::user()->ordersPast->chunk(1) as $orders_past)
    @foreach($orders_past as $order_past)
    <div class="container boxx mt-5" >
        <div class="row">
            <div class="col-sm-10">
                <h5 class="text-subtitle" style="color:#009ee3">Inversiones retiradas</h5>
                <div class="card mt-3">
                    <div class="card-header">
                        <h4 class="text-subtitle" style="font-size:1.2em">${{ $order_past->price }} Plan</h4>
                    </div>
                    <div class="card-body">
                    <h6 class="text-subtitle" style="font-weight:bold;">Fecha y hora de retiro: </h6><p>{{ $order_past->created_at->format('d-M-Y - H:i:s ') }}</p>
                    <h6 class="text-subtitle" style="font-weight:bold">Inversión retirada: <h4 class="text-descriptive" style="color:#009ee3">${{ $order_past->profit }}</h4></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@empty
    <div class="container boxx mt-5" >
        <div class="row">
            <div class="col-sm-12">
                <h5 class="text-subtitle" style="color:#009ee3">Inversiones retiradas</h5>
                <h6 class="text-subtitle">Hasta ahora no has retirado ninguna inversión</h6>
            </div>
        </div>
    </div>
@endforelse

@if(Auth::user()->orders->count() == 0 && Auth::user()->ordersPast->count() == 0)


@include('partials._footer')

@endif

@endsection 





