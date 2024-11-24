@extends('adminlte::page')

@section('title', 'Ver Partido')

@section('content_header')

@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mb-3">
            <h1>Datos del Partido "{{ $clash->clash_id }}"</h1>
            <a href="{{ route('clash.index') }}" class="btn btn-sm btn-secondary text-uppercase">
                Volver al Listado
            </a>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <p><strong>Local:</strong> {{ $clash->homeTeam->name }}</p>
                    </div>
                    <div class="mb-3">
                        <p><strong>Goles:</strong> {{ $clash->goals_home }}</p>
                    </div>
                    <div class="mb-3">
                        <p><strong>Visitante:</strong> {{ $clash->awayTeam->name }}</p>
                    </div>
                    <div class="mb-3">
                        <p><strong>Goles:</strong> {{ $clash->goals_away }}</p>
                    </div>
                    <div class="mb-3">
                        <p><strong>Árbitro:</strong> {{ $clash->referee->name }}</p>
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