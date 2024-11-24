@extends('adminlte::page')

@section('title', 'Ver')

@section('content_header')

@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mb-3">
            <h1>Datos del Jugador "{{ $player->name }}"</h1>
            <a href="{{ route('player.index') }}" class="btn btn-sm btn-secondary text-uppercase">
                Volver al Listado
            </a>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <img src="{{ $player->photo }}" alt="{{ $player->name }}" id="image_preview" class="img-fluid" style="object-fit: cover; object-position: center; height: 420px; width: 50%;">
                    </div>
                    <div class="mb-3">
                        <h2>Nombre del Jugador: {{ $player->name }}</h2>
                    </div>
                    <div class="mb-3">
                        <p>DNI: {{ $player->dni }}</p>
                    </div>
                    <div class="mb-3">
                        <p>Género: {{ $player->gender }}</p>
                    </div>
                    <div class="mb-3">
                        <p>Teléfono {{ $player->phone }}.</p>
                    </div>
                    <div class="mb-3">
                        <p>Fecha de Nac. {{ $player->birthdate }}.</p>
                    </div>
                    <div class="mb-3">
                        <p> Edad: {{ $player->age }}</p>
                    </div>
                    <div class="mb-3">
                        <p> Equipo: {{ $player->team->name }}</p>
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