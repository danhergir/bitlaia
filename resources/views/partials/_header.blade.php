@if(Auth::guest())
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 navbar navbar-light" >
            <div class="navbar my-2">
                <a href="{{ route('welcome.index') }}" style="cursor:pointer">
                    <img style="height:40px;float: left;" src="{{ asset('images/Logo.png') }}" alt="AdicTec-Logo">    
                
                    <h2 class="ml-2 " style="color: #00d2ff;float: left;margin: 0;">BITLAIA</h2>
                </a>

            </div>
            <div class="navbar-text">
                <a href="{{ route('login') }}" class="bbtn button-hover btn btn-outline-primary my-2 my-sm-0 text-primary mr-3">Ingresá</a>
                <a href="{{ route('register') }}" class="bbtn btn btn-outline-primary my-2 my-sm-0 text-white mr-3" style="background-color: #009ee3">Creá tu cuenta</a>
            </div>
        </div>
    </div>
</div>
@else 
<div class="container-fluid" style="background: #fff;-webkit-box-shadow: 0 1px 4px 0 rgba(0,0,0,.32);box-shadow: 0 1px 4px 0 rgba(0,0,0,.32);">
    <div class="row">
        <div class="col-sm-12 navbar navbar-light" >
            <div class="navbar my-2">
                <a href="{{ route('welcome.index') }}" style="cursor:pointer">
                    <img style="height:40px;float: left;" src="{{ asset('images/Logo.png') }}" alt="AdicTec-Logo">    
                
                    <h2 class="ml-2 " style="color: #00d2ff;float: left;">BITLAIA</h2>
                </a>
            </div>
            <div class="navbar-text">
                @if (Auth::user() && Auth::user()->isAdmin())
                <a href="{{ route('admin.dashboard') }}" class="bbtn button-hover btn btn-outline-primary my-2 my-sm-0 text-primary mr-3"><i class="fas fa-tachometer-alt mr-2"></i></i> Admin Dashboard</a>
                @endif
                <a href="{{ route('user.account') }}" class="bbtn button-hover btn btn-outline-primary my-2 my-sm-0 text-primary mr-3"><i class="fas fa-wallet mr-2"></i> Mi cuenta</a>
                <a href="{{ route('logout') }}" class="bbtn btn btn-outline-primary my-2 my-sm-0 text-white mr-3" style="background-color: #009ee3">Cerrar sesión</a>
            </div>
        </div>
    </div>
</div>
@endif
