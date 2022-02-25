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
    <h2> {{ $mod }} Servicio</h2>
</nav>
<div class="container" style="width: 600px; margin-top: 30px;">

    <div class="form-group">
        <label for="ventaServicio" style="width: 160px" class="col-sm-2 col-form-label">Venta</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="ventaServicio" name="ventaServicio"
                value="{{ isset($Servici->ventaServicio) ? $Servici->ventaServicio : old('ventaServicio') }}">
        </div>
    </div>
    <div class="form-group">
        <label for="precioServicio" style="width: 160px" class="col-sm-2 col-form-label">Precio del Servicio</label>
        <div class="col-sm-12">
            <input type="number" class="form-control" id="precioServicio" name="precioServicio"
                value="{{ isset($Servici->precioServicio) ? $Servici->precioServicio : old('precioServicio') }}">
        </div>
    </div>
    <br>
    <div class="form-group">
        <label for="fotoServicio" style="width: 240px" class="col-sm-12 col-form-label"></label>
        @if (isset($Servici->fotoServicio))
            <img name="fotoServicio" id="fotoServicio" class="img-thumbnail img-fluid"
                src="{{ asset('storage') . '/' . $Servici->fotoServicio }}" alt=""
                style="width: 100px;height: 100px;">
        @endif
        <div class="col-sm-12">
            <input class="form-control" type="file" id="fotoServicio" name="fotoServicio">
        </div>
    </div><br>
    <div class="btn" style="margin-left: 150px">
        <input type="submit" style="width: 120px" class="btn btn-success" value="{{ $mod }} datos">
        | <a class="btn btn-primary" style="width: 120px" href="{{ url('Servicios/') }}">Volver</a>
    </div>
</div>
