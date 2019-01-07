@extends('layouts.app')

@section('title')
    BITLAIA | CREA UNA CUENTA AHORA MISMO
@endsection

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="header">
                <div class="text-subtitle text-center" style="font-size:1.5em; color:#009ee3 ">{{ __('Registro') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf


                        <div class="col-md-6 text-center" style="margin: 0 auto;">
                            <div class="form-group row mb-3 justify-content-center">
                                <label for="name" class="">{{ __('Nombre y apellido') }}</label>
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group row mb-3 justify-content-center">
                                <label for="email" class="">{{ __('E-Mail') }}</label>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group row mb-3 justify-content-center">
                                <label for="password" class="">{{ __('Contraseña') }}</label>
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="form-group row mb-3 justify-content-center">
                                <label for="password-confirm" class="">{{ __('Confirma la contraseña') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>



                            <div class="form-group row mb-3 justify-content-center">
                                <button type="submit" class="btn btn-primary justify-content-center">
                                    {{ __('Registrarme') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
