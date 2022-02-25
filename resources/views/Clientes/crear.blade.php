@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row g-1 text-light"
            style="background-color: teal;width: 700px;height: 570px;margin-left: 200px;">
            <br>
            <form action="{{ route('Clientes.store') }}" method="post" style="d-inline" enctype="multipart/form-data">
                @csrf


                @include('Clientes.frm',['mod'=>'Crear']);


            </form>
        </div>
    </div>
@endsection
