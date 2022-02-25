@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row g-1 text-light"
            style="background-color: teal;width: 700px;height: 575px;margin-left: 200px;">
            <form action="{{ route('Clientes.update', $Client->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                @include('Clientes.frm',['mod'=>'Modificar']);


            </form>
        </div>
    </div>
@endsection
