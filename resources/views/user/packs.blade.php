@extends('layouts.app')

@section('title')
    BITLAIA | PLANES
@endsection

@section('content')


<style>


.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
    margin-bottom: 0;
}

.boxx {
    background: #fff;
    -webkit-border-radius: .25em;
    border-radius: .25em;
    padding: 20px;
    background: #fff;
    -webkit-box-shadow: 0 0.07em 0.125em 0 rgba(0,0,0,.15);
    box-shadow: 0 0.07em 0.125em 0 rgba(0,0,0,.15);
}



.col-sm-3:hover {
    -webkit-box-shadow: 0 0.17em 1.125em 0 rgba(0,0,0,.15);
    box-shadow: 0 0.17em 1.125em 0 rgba(0,0,0,.15);
}


</style>



<div class="container justify-content-center mt-3 boxx text-center">
        <h3 style="text-transform: uppercase;width: 100%;text-align: center;">Estos son nuestros paquetes de inversión!</h3>
</div>

<div class="container justify-content-center mt-3 boxx text-center">
        <h5>Puedes escoger y comprar la cantidad que quieras.</h5>
</div>



<div class="container">

    <div class="row justify-content-center">
    @foreach($packs as $pack)
        <div class="col-sm-3 mt-5 mr-3 p-3 boxx" >
            <div class="card-title text-center">
                <h6 class="text-subtitle text-primary " style="font-size:1.5em">{{ $pack->title }}</h6>
            </div>
            <div class="card-body">
                <p class="text-descriptive" style="font-weight:bold; text-align:center">{{ $pack->description }}</p>
                <p class="text-descriptive text-secondary ml-1" style="font-style:italic; text-align:center; font-size:10px">Los pagos son hechos con criptomonedas</p>
            </div>
            <div class="payment-section text-center">
            <form method="POST" action="{{ route('user.checkout') }}">
                @csrf
                <input type="hidden" name="pack_name" value="{{ $pack->title }}">
                <input type="hidden" name="pack_price" value="{{ $pack->price }}">
                <button type="submit" class="btn btn-outline-primary">INVERTIR</button>
            </form>    
            </div>
        </div>
    @endforeach
    </div>
</div>

<div class="container justify-content-center mt-5 boxx">
        <h5 style="font-weight: 100;">Recuerda que el paquete se valoriza en dólares, pero se paga con criptomonedas. </h5>
</div>

<div class="container justify-content-center mt-3 boxx">
        <h5 style="font-weight: 100;">Las inversiones y sus ganancias se podrán retirar luego de los primero 30 días transcurridos.</h5>
</div>

<div class="container justify-content-center mt-3 boxx">        
        <h5 style="font-weight: 100;">Al momento de retirar, deberás cargar tu dirección de billetera bitcoin.</h5>
</div>



@include('partials._footer')

@endsection