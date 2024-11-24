@extends('adminlte::page')

@section('title', 'Ver')

@section('content_header')

@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mb-3">
            <h1>Datos de la Inscripción del campeonato "{{ $inscription->championship->name }}"</h1>
            <a href="{{ route('inscription.index') }}" class="btn btn-sm btn-secondary text-uppercase">
                Volver al Listado
            </a>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <img src="{{ $inscription->championship->logo }}" alt="{{ $inscription->championship->name }}" id="image_preview" class="img-fluid" style="object-fit: cover; object-position: center; height: 420px; width: 50%;">
                    </div>
                    <div class="mb-3">
                        <h2>Nombre del Campeonato: {{ $inscription->championship->name }}</h2>
                    </div>
                    <div class="mb-3">
                        <p>Fecha de Inscripción: {{ $inscription->inscription_date }}</p>
                    </div>
                    <div class="mb-3">
                        <p>Precio: ${{ $inscription->price }}</p>
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