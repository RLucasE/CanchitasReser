@extends('adminlte::page')

@section('title', 'Ver Arbitro')

@section('content_header')

@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mb-3">
            <h1>Datos del Arbitro "{{ $referee->name }}"</h1>
            <a href="{{ route('referee.index') }}" class="btn btn-sm btn-secondary text-uppercase">
                Volver al Listado
            </a>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <h2>Nombre del Arbitro: {{ $referee->name }}</h2>
                    </div>
                    <div class="mb-3">
                        <p>DNI: {{ $referee->dni }}</p>
                    </div>
                    <div class="mb-3">
                        <p>Teléfono: {{ $referee->phone }}.</p>
                    </div>
                    <div class="mb-3">
                        <p>Fecha de Nac.: {{ $referee->birthdate }}.</p>
                    </div>
                    <div class="mb-3">
                        <p> Edad: {{ $referee->age }}</p>
                    </div>
                    <div class="mb-3">
                        <p> Domicilio: {{ $referee->address }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')

@stop

@section('js')

@stop