@extends('adminlte::page')

@section('title', 'Ver Reserva')

@section('content_header')

@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mb-3">
            <h1>Datos de la Reserva "{{ $reservation->reservation_id }}"</h1>
            <a href="{{ route('reservation.index') }}" class="btn btn-sm btn-secondary text-uppercase">
                Volver al Listado
            </a>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <p><strong>Cancha Nro.:</strong> {{ $reservation->field->field_id }}</p>
                    </div>
                    <div class="mb-3">
                        <p><strong>Tipo de Cancha:</strong> {{ $reservation->field->capacity }}</p>
                    </div>

                    <!-- Despues poner para mostrar la persona que hizo el pago para la reserva -->
                    <div class="mb-3">
                        <p><strong>Campeonato:</strong> {{ $reservation->matchday->championship->name }}</p>
                    </div>
                    <div class="mb-3">
                        <p><strong>Partido entre:</strong> {{ $reservation->clash->homeTeam->name }} - {{ $reservation->clash->awayTeam->name }}</p>
                    </div>
                    <div class="mb-3">
                        <p><strong>Fecha Nro.:</strong> {{ $reservation->matchday->matchday_number }}</p>
                    </div>

                    <div class="mb-3">
                        <p><strong>Fecha del partido:</strong> {{ $reservation->reservation_date->format('d/m/Y') }}</p>
                    </div>
                    <div class="mb-3">
                        <p><strong>Hora:</strong> {{ $reservation->reservation_time->format('H:i') }}</p>
                    </div>

                </div>
            </div>

            <div class="card">
                <div class="card-body" style="width: 40%; margin: 0 auto; text-align: center;">
                    <p>{{ $reservation->matchday->championship->name }} - Fecha {{ $reservation->matchday->matchday_number }}</p>
                    <p>
                        {{ $reservation->clash->homeTeam->name }}
                        <img src="{{ $reservation->clash->homeTeam->logo }}" class="img-fluid img-thumbnail tabla-escudo" alt="..." style="width: 50px; height: 50px;">
                        Vs.
                        <img src="{{ $reservation->clash->awayTeam->logo }}" class="img-fluid img-thumbnail tabla-escudo" alt="..." style="width: 50px; height: 50px;">
                        {{ $reservation->clash->awayTeam->name }}
                    </p>
                    <p>{{ $reservation->reservation_time->format('H:i') }} Hs.</p>
                    <p>Cancha {{ $reservation->field->field_id }}</p>

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