@extends('layouts.app')
@section('content')
    <div class="container text-light">

            @if (Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('mensaje') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            @endif

        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nombre del Cliente</th>
                    <th>Venta</th>
                    <th>Rut de Cliente</th>
                    <th>Cantidad de pedidos</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($Clientes as $clien)
                    <tr>
                        <td>
                            <img class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $clien->servicios->fotoServicio }}"
                                width="150" alt="">

                        </td>
                        <td>{{ $clien->nombreCliente }}</td>
                        <td>{{ $clien->servicios->ventaServicio}}</td>
                        <td>{{ $clien->rutCliente }}</td>
                        <td>{{ $clien->cantpedidoCliente }}</td>
                        <td>

                            <a class="btn btn-warning text-light" style="width: 80px; height: 35px;"
                                href="{{ route('Clientes.edit', $clien->id) }}">
                                Modificar
                            </a>

                            |

                            <form action="{{ url('/Clientes/' . $clien->id) }}" class="d-inline" method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input class="btn btn-danger" style="width: 80px; height: 35px;" type="submit"
                                    onclick="return confirm('¿Eliminar definitivo?')" value="Eliminar">
                            </form>

                            |

                            <a class="btn btn-info text-light" style="width: 80px; height: 35px;"
                                href="{{ url('relacion') }}">
                                Detalle
                            </a>

                        </td>
                    </tr>
                @endforeach
            </tbody>

            <a class="btn btn-info text-white" style="margin-left: 450px;margin-bottom: 10px"
                href="{{ url('Clientes/create') }}">Registrar Nuevo Cliente</a>
        </table>
        {{!! $Clientes->links() !!}}


    </div>
@endsection
