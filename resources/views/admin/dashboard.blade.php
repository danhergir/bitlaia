@extends('layouts.app')

@section('title')
    Admin Dashboard | Dashboard del administrador
@endsection

@section('content')
    <div class="container mt-3">
        <div class="row border rounded pt-4 bg-gray">
            <div class="col-sm-4 mb-2 text-center">
                <h4 class="text-subtitle">Total de usuarios activos</h4>
                <h6 class="text-subtitle" style="font-size:1.8em; color:#009ee3">{{ $activeUsers }}</h6>
            </div>
            <div class="col-sm-4 mb-2 text-center">
                <h4 class="text-subtitle">Número de inversiones activas</h4>
                <h6 class="text-subtitle" style="font-size:1.8em; color:#009ee3">{{ $numberActiveOrders }}</h6>
            </div>
            <div class="col-sm-4 mb-2 text-center">
                <h4 class="text-subtitle">Valor total inversiones activas</h4>
                <h6 class="text-subtitle" style="font-size:1.8em; color:#009ee3">${{ $totalValue }}</h6>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="accordion col-sm-12" id="accordionExample">
                <div class="card mb-4">
                    <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed text-subtitle" style="font-size: 1.2em; text-decoration: none;" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            Inversiones activas
                        </button>
                    </h5>
                    </div>
                
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        @forelse ($activeOrders as $activeOrder)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Fecha de Creación</th>
                                    <th scope="col">ID Orden Coingate</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Utilidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <td>{{ $activeOrder->id }}</td>
                                <td>{{ $activeOrder->created_at }}</td>
                                <td>{{ $activeOrder->order_id }}</td>
                                <td>{{ $activeOrder->price }}</td>
                                <td>{{ $activeOrder->client }}</td>
                                <td>{{ $activeOrder->profit }}</td>
                                </tr>
                            </tbody>
                        </table>
                        @empty
                        <div class="card card-body">
                            <h5 class="text-subtitle">No hay inversiones activas en este momento.</h5>
                        </div>
                        @endforelse
                    </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed text-subtitle" style="font-size: 1.2em; text-decoration: none;" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Inversiones por retirar
                        </button>
                    </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        @forelse ($ordersRetire as $orderRetire)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Fecha de Creación</th>
                                    <th scope="col">ID Orden Coingate</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Utilidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <td>{{ $orderRetire->id }}</td>
                                <td>{{ $orderRetire->created_at }}</td>
                                <td>{{ $orderRetire->order_id }}</td>
                                <td>{{ $orderRetire->price }}</td>
                                <td>{{ $orderRetire->client }}</td>
                                <td>{{ $orderRetire->profit }}</td>
                                <td><button class="btn btn-primary retire">Inversión retirada</button></td>
                                <input class="order-retire" id="order-retire" type="hidden" value="{{ $orderRetire->id }}">
                                </tr>
                            </tbody>
                        </table>
                        @empty
                        <div class="card card-body">
                            <h5 class="text-subtitle">No hay inversiones por retirar en este momento.</h5>
                        </div>
                        @endforelse
                    </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header" id="headingThree">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed text-subtitle" style="font-size: 1.2em; text-decoration: none;" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Inversiones pagadas/retiradas
                        </button>
                    </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        @forelse ($ordersRetired as $orderRetired)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Fecha de Creación</th>
                                    <th scope="col">ID Orden Coingate</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Utilidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <td>{{ $orderRetired->id }}</td>
                                <td>{{ $orderRetired->created_at }}</td>
                                <td>{{ $orderRetired->order_id }}</td>
                                <td>{{ $orderRetired->price }}</td>
                                <td>{{ $orderRetired->client }}</td>
                                <td>{{ $orderRetired->profit }}</td>
                                </tr>
                            </tbody>
                        </table>
                        @empty
                        <div class="card card-body">
                            <h5 class="text-subtitle">No hay inversiones retiradas en este momento.</h5>
                        </div>
                        @endforelse
                    </div>
                    </div>
                </div> 
                <div class="card mb-4">
                    <div class="card-header" id="headingThree">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed text-subtitle" style="font-size: 1.2em; text-decoration: none;" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Usuarios registrados
                        </button>
                    </h5>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                    <div class="card-body">
                        @forelse ($users as $user)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Fecha de Creación</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                </tr>
                            </tbody>
                        </table>
                        @empty
                        <div class="card card-body">
                            <h5 class="text-subtitle">No hay usuarios registrados hasta ahora.</h5>
                        </div>
                        @endforelse
                    </div>
                    </div>
                </div>    
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="{{ asset('js/mean.js') }}"></script>
<script type="text/javascript">
    var token = '{{ Session::token() }}';
    var urlRetire = '{{ route('order.retire') }}';
</script>
@endsection

