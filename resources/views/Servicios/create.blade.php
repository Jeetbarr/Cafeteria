@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row g-1 text-light"
            style="background-color: teal;width: 700px;height: 540px;margin-left: 200px;">
            <br>
            <form action="{{ route('Servicios.store') }}" method="post" style="d-inline" enctype="multipart/form-data">
                @csrf

                @include('Servicios.frms',['mod'=>'Crear'])

            </form>
        </div>
    </div>
@endsection
