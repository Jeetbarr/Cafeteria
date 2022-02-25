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
                    <th>#</th>
                    <th>Foto</th>
                    <th>Venta</th>
                    <th>Precio del Servicio</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($Servicios as $serv)
                    <tr>
                        <td>{{ $serv->id }}</td>
                        <td>
                            <img class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $serv->fotoServicio }}"
                                width="150" alt="">

                        </td>
                        <td>{{ $serv->ventaServicio }}</td>
                        <td>{{ $serv->precioServicio }}</td>
                        <td>

                            <a class="btn btn-warning text-light" style="width: 80px; height: 35px;"
                                href="{{ route('Servicios.edit', $serv->id) }}">
                                Modificar
                            </a>

                            |

                            <form action="{{ url('/Servicios/' . $serv->id) }}" class="d-inline" method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input class="btn btn-danger" style="width: 80px; height: 35px;" type="submit"
                                    onclick="return confirm('¿Eliminar definitivo?')" value="Eliminar">
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>

            <a class="btn btn-info text-white" style="margin-left: 450px;margin-bottom: 10px"
                href="{{ url('Servicios/create') }}">Registrar Nueva Orden</a>
        </table>
        {{!! $Servicios->links() !!}}


    </div>
@endsection
