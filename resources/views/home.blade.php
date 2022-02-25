@extends('layouts.app')

@section('content')
    <div class="container ">
        <div class="row">

            <div class="card ">
                <div class="card-header ">{{ __('Menu Cafeteria') }}</div>

                <div class="card-body ">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div style="margin-left: 450px"><h4 class=" card-title ">{{ __('Ordenes ') }}</h4></div>
                </div>
            </div>

        </div>
    </div>
@endsection
