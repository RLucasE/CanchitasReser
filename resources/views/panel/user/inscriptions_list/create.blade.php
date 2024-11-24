@extends('adminlte::page')

@section('title', 'Crear Inscripción')

@section('content_header')

@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mb-3">
            <h1>Crear nueva incripción </h1>
            <a href="{{ route('inscription.index') }}" class="btn btn-sm btn-secondary text-uppercase">
                Volver al Listado
            </a>
        </div>

        <div class="col-12">
            @include('panel.user.inscriptions_list.forms.form')
        </div>

    </div>
</div>
@stop

@section('css')

@stop

@section('js')

@stop