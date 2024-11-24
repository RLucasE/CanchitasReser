@extends('adminlte::page')

@section('title', 'Ver')

@section('content_header')

@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mb-3">
            <h1>Datos de la Cancha "{{ $field->field_id }}"</h1>
            <a href="{{ route('field.index') }}" class="btn btn-sm btn-secondary text-uppercase">
                Volver al Listado
            </a>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <img src="{{ $field->photo }}" alt="{{ $field->field_id }}" id="image_preview" class="img-fluid" style="object-fit: cover; object-position: center; height: 420px; width: 100%;">
                    </div>
                    <div class="mb-3">
                        <h2>Cancha Nro.: {{ $field->field_id }}</h2>
                    </div>
                    <div class="mb-3">
                        <p>Capacidad: {{ $field->capacity }}</p>
                    </div>
                    <div class="mb-3">
                        <p>Precio: {{ $field->price }}</p>
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