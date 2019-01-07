@extends('layouts.app')

@section('title')
    BITLAIA | INGRESA A TU CUENTA AHORA MISMO
@endsection

@section('content')
<div class="container mt-5 my-5">
    <div class="text-center" style="color:#009ee3;font-size: 1.2em;font-weight: 100;">{{ __('¡Hola! Para seguir, ingresá tu e-mail y contraseña') }}</div>
    <div class="row justify-content-center">

        <div class="col-md-5">
            <div class="header">

                <div class="card-body" style="margin-top: 20px;-webkit-box-shadow: 0 1px 6px 0 rgba(0,0,0,.3);box-shadow: 0 1px 6px 0 rgba(0,0,0,.3);-webkit-border-radius: 4px;border-radius: 4px;">
                    
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        
                        <div class="row justify-content-center">
                             @if ($errors->has('email'))
                                <span class="text-danger">
                                    <strong class="text-center">{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="row">
                            <label for="email" class="text-center mb-0" style="margin: 0 auto;">{{ __('E-mail') }}</label>
                        </div>

                        <div style="max-width: 300px;margin: 0 auto;">
                            <input class="form-control" id="email" type="email" {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                        </div>

                        <div class="row mt-3">
                            <label for="password" class="text-center mb-0" style="margin: 0 auto;">{{ __('Contraseña') }}</label>
                        </div>

                        <div style="max-width: 300px;margin: 0 auto;">
                            <input id="password" type="password" class="form-control" {{ $errors->has('password') ? ' is-invalid' : '' }} name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group row mb-0 mt-4" >
                            <div class="text-center" style="margin: 0 auto;" >
                                <button type="submit" class="btn btn-primary" style="margin: 0 auto;display: block;">
                                    {{ __('Entrar') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link " href="{{ route('password.request') }}">
                                        {{ __('¿Olvidaste tu contraseña?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
