@extends('adminlte::page')

@section('title', 'Ver')

@section('content_header')

@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mb-3">
            <h1>Datos del Campeonato "{{ $championship->name }}"</h1>
            <a href="{{ route('championship.index') }}" class="btn btn-sm btn-secondary text-uppercase">
                Volver al Listado
            </a>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <img src="{{ $championship->logo }}" alt="{{ $championship->name }}" id="image_preview" class="img-fluid" style="object-fit: cover; object-position: center; height: 420px; width: 50%;">
                    </div>
                    <div class="mb-3">
                        <h2>Nombre del Campeonato: {{ $championship->name }}</h2>
                    </div>
                    <div class="mb-3">
                        <p>Fecha de Inicio: {{ $championship->start_date }}</p>
                    </div>
                    <div class="mb-3">
                        <p>Fecha de Finalización: {{ $championship->end_date }}</p>
                    </div>
                    <div class="mb-3">
                        <p>Tipo de Cancha {{ $championship->field_type }}.</p>
                    </div>
                    <div class="mb-3">
                        <p>Max. cantidad de equipos {{ $championship->max_number_participants }}.</p>
                    </div>
                    <div class="mb-3">
                        <p> Tipo de Campeonato: {{ $championship->gender }}</p>
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