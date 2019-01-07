@extends('layouts.app')

@section('title')
    BITLAIA | INVERSIONES COLECTIVAS
@endsection

@section('content')

<style>

@media screen and (max-width: 576px){


}

@media screen and (min-width: 576px){


}


@media screen and (min-width: 768px){


    .col-sm-4 {
    border-right: 1px solid #ddd
    }


}

@media screen and (min-width: 992px){

    .col-sm-4 {
    border-right: 1px solid #ddd
    }

}

@media screen and (min-width: 1200px){


    .col-sm-4 {
    border-right: 1px solid #ddd
    }
}

.fotoinicio {
	position: relative;
	width: 100%;margin: 0;
	height: 500px;
	background-position: center center;
	background-repeat: no-repeat;
	background-attachment: fixed;
	background-size: cover;
	background-blend-mode: overlay;
	background-image: url(/images/wallpaper.jpg);-webkit-backdrop-filter: blur(10px);
	/* Safari 9+ */backdrop-filter: blur(10px);
	/* Chrome and Opera */background-color: rgba(0, 0, 0, 0.38);
}


</style>

<div class="container-fluid fotoinicio">
	<div class="row">
        <h1 class="container" style="text-transform: uppercase;margin-top: 130px;color: #fff;text-align: center;font-size: 50px;">ganancias mensuales<br> en dolares <br>100% en automático
        </h1>
    </div>
</div>


<div class="container">
    <div class="row mx-auto">
        <div class="col-sm-4 mt-5 text-center" >
            <span class="navbar-brand" style="margin-right: 0;"><i style="height:60px; width:100px; color:#009ee3" class="fas fa-money-check-alt"></i></span>
            <h6 class="text-center text-subtitle">Incrementa ganancias</h6>
            <p class="text-descriptive">Planes de ahorro dolarizados de hasta 5% por mes. Deja que tu dinero trabaje por ti.</p>
            <a href="{{ route('user.packs') }}">Invierte aquí.</a>
        </div>
        <div class="col-sm-4 mt-5 text-center">
            <span class="navbar-brand" style="margin-right: 0;"><i style="height:60px; width:100px; color:#009ee3" class="fab fa-bitcoin"></i></span>
            <h6 class="text-center text-subtitle">Paga con criptomonedas</h6>
            <p>Invertí y retira con criptomonedas.<br>
            Más cómodo y más rápido </p>
            <a href="{{ route('user.packs') }}">Mira los planes.</a>
        </div>
        <div class="col-sm-4 mt-5 text-center" style="border-right: none!important;">
            <span class="navbar-brand" style="margin-right: 0;"><i style="height:60px; width:100px; color:#009ee3" class="fas fa-chart-line"></i></span>
            <h6 class="text-center text-subtitle">Sigue tus cuentas</h6>
            <p class="text-descriptive">¿Ya viste tus ganancias de hoy? Revisalas todos los días.</p>
            <a href="{{ route('user.account') }}">Mira tus inversiones.</a>
        </div>
    </div>
</div>


<!--
<div class="container">
	<div class="row mt-5 mx-auto">
		<h1 style="margin: 0 auto;padding-bottom: 10px;border-bottom: 1px solid #d6d6d6;margin-bottom: 20px;width: 500px;text-align: center;">SOBRE NOSOTROS</h1>
		<h5 style="font-weight: 400;width: 137%!important;margin: auto -20px; text-align: justify;">La plataforma BITLAIA es un servicio de inversión que actúa como administrador de activos a través de varias carteras de fondos de inversión, trading en forex y minado de criptomonedas.<br>
        El mercado objetivo de la empresa son los inversores institucionales, corporativos y privados con cualquier cantidad de capital. <br>
		BITLAIA financia solo los proyectos prometedores.<br>
        La empresa examina cuidadosamente a cada proyecto para cumplir con nuestros criterios con el fin de garantizar la perspectiva de ingresos máximos para cada inversor.<br>
		Garantizamos a nuestros clientes la seguridad de sus fondos dando la prioridad a la calidad de las operaciones y su rentabilidad en vez la cantidad de proyectos. <br>
        BITLAIA administra adecuadamente el capital y lo protege contra cualquier riesgo, debido a una cartera de inversiones totalmente equilibrada.
		</h5>
	</div>
</div>
-->

@include('partials._footer')
@endsection