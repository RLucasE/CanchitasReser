@extends('adminlte::page')

@section('title', 'Ver Fecha')

@section('content_header')

@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mb-3">
            <h1>Datos de la Fecha del campeonato "{{ $matchday->championship->name }}"</h1>
            <a href="{{ route('matchday.index') }}" class="btn btn-sm btn-secondary text-uppercase">
                Volver al Listado
            </a>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <img src="{{ $matchday->championship->logo }}" alt="{{ $matchday->championship->name }}" id="image_preview" class="img-fluid" style="object-fit: cover; object-position: center; height: 420px; width: 50%;">
                    </div>
                    <div class="mb-3">
                        <h2>Nombre del Campeonato: {{ $matchday->championship->name }}</h2>
                    </div>
                    <div class="mb-3">
                        <p>Fecha Nro.: {{ $matchday->matchday_number }}</p>
                    </div>
                    <div class="mb-3">
                        <p>Fecha de Inicio: ${{ $matchday->start_date }}</p>
                    </div>
                    <div class="mb-3">
                        <p>Fecha de Finalización: ${{ $matchday->end_date }}</p>
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