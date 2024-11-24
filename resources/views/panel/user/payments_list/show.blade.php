@extends('adminlte::page')

@section('title', 'Ver')

@section('content_header')

@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mb-3">
            <h1>Datos del Pago "{{ $payment->payment_id }}"</h1>
            <a href="{{ route('payment.index') }}" class="btn btn-sm btn-secondary text-uppercase">
                Volver al Listado
            </a>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <h2>Nro de Pago: {{ $payment->payment_id }}</h2>
                    </div>
                    <div class="mb-3">
                        <p>Usuario: {{ $payment->user->name }}</p>
                    </div>
                    <div class="mb-3">
                        <p>Delegado: {{ $payment->leader->user->name }}</p>
                    </div>
                    <div class="mb-3">
                        <p>Nombre del campeonato: {{ $payment->inscription->championship->name }}</p>
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