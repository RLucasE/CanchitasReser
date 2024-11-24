@extends('adminlte::page')

@section('title', 'Ver')

@section('content_header')

@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mb-3">
            <h1>Datos del Delegado "{{ $leader->user->name }}"</h1>
            <a href="{{ route('leader.index') }}" class="btn btn-sm btn-secondary text-uppercase">
                Volver al Listado
            </a>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <h2>Nombre del Delegado: {{ $leader->user->name }}</h2>
                    </div>
                    <div class="mb-3">
                        <p>DNI: {{ $leader->user->dni }}</p>
                    </div>
                    <div class="mb-3">
                        <p>Género: {{ $leader->user->gender }}</p>
                    </div>
                    <div class="mb-3">
                        <p>Teléfono: {{ $leader->user->phone }}</p>
                    </div>
                    <div class="mb-3">
                        <p>Fecha de Nac.: {{ $leader->user->birthdate }}.</p>
                    </div>
                    <div class="mb-3">
                        <p> Edad: {{ $leader->user->age }}</p>
                    </div>
                    <div class="mb-3">
                        <p> Equipo: {{ $leader->team->name }}</p>
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