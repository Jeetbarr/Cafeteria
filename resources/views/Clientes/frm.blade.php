<script src="{{ asset('js/app.js') }}" defer></script>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

@if (count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif

<nav class="container-lg card-tittle" style="margin-left: 240px;margin-top:10px">
    <h2> {{ $mod }} Cliente</h2>
</nav>
<div class="container" style="width: 600px; margin-top: 30px;">

    <div class="form-group">
        <label for="nombreCliente" style="width: 160px" class="col-sm-3 col-form-label">Nombre del Cliente</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="nombreCliente" name="nombreCliente"
                value="{{ isset($Client->nombreCliente) ? $Client->nombreCliente : old('nombreCliente') }}">
        </div>
    </div>
    <div class="form-group">
        <label for="id_servicios" style="width: 160px" class="col-sm-3 col-form-label">Venta(ID)</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="id_servicios" name="id_servicios"
                value="{{ isset($Client->id_servicios) ? $Client->id_servicios : old('id_servicios') }}">
        </div>
    </div>
    <div class="form-group">
        <label for="rutCliente" style="width: 160px" class="col-sm-2 col-form-label">Rut del Cliente</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="rutCliente" name="rutCliente"
                value="{{ isset($Client->rutCliente) ? $Client->rutCliente : old('rutCliente') }}">
        </div>
    </div>
    <div class="form-group">
        <label for="cantpedidoCliente" style="width: 160px" class="col-sm-2 col-form-label">Cantidad de pedidos</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="cantpedidoCliente" name="cantpedidoCliente"
                value="{{ isset($Client->cantpedidoCliente) ? $Client->cantpedidoCliente : old('cantpedidoCliente') }}">
        </div>
    </div>
    <br>
    <div class="btn" style="margin-left: 150px">
        <input type="submit" style="width: 120px" class="btn btn-success" value="{{ $mod }} datos">
        | <a class="btn btn-primary" style="width: 120px" href="{{ url('Clientes/') }}">Volver</a>
    </div>
</div>
