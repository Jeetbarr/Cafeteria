@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row g-1 text-light"
            style="background-color: teal;width: 700px;height: 570px;margin-left: 200px;">
            <form action="{{ route('Servicios.update', $Servici->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                @include('Servicios.frms',['mod'=>'Modificar'])


            </form>
        </div>
    </div>
@endsection
