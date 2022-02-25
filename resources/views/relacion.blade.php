@extends('layouts.app')
@section('content')

    <div class="container text-light">
            <table class="table table-dark table-striped table-hover">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Venta</th>
                        <th>Nombre del Cliente</th>
                        <th>Cantidad de pedidos</th>
                        <th>Valor total</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($Clientes as $clien)

                        <tr>
                            <td>
                                <img class="img-thumbnail img-fluid"
                                    src="{{ asset('storage') . '/' . $clien->servicios->fotoServicio }}" width="150"
                                    alt="">

                            </td>
                            <td>{{ $clien->servicios->ventaServicio }}</td>
                            <td>{{ $clien->nombreCliente }}</td>
                            <td>{{ $clien->cantpedidoCliente }}</td>
                            <td>{{ $suma = $clien->servicios->precioServicio * $clien->cantpedidoCliente }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
@endsection
