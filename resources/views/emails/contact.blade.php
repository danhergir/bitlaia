<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Notificación de retiro de inversión</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-10">
                <div class="header">
                    <h1>Notificación de retiro de inversión</h1>
                </div>
                <div class="body">
                    <h5>Nombre: {{ $name }}</h5>
                    <h5>Correo Electrónico: {{ $email }}</h5>
                    <h5>Cuenta Criptomonedas: {{ $btcAddress }}<h5>
                </div>
            </div>
        </div>
    </div>
</body>
</html>