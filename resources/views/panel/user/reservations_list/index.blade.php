{{-- Extiende de la plantilla de Admin LTE, nos permite tener el panel en la vista --}}
@extends('adminlte::page')

{{-- Titulo en las tabulaciones del Navegador --}}
@section('title', 'Reservas')

{{-- Titulo en el contenido de la Pagina --}}
@section('content_header')
<h1>Lista de Reservas</h1>
@stop

{{-- Contenido de la Pagina --}}
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 mb-3">

            <a href="{{ route('reservation.create') }}" class="btn btn-success text-uppercase">
                Nueva Reserva
            </a>
            <a class="new-button" target="_blank" href="{{ route('reservation.generatePDF') }}">
                Generar PDF
            </a>

        </div>

        @if(session('alert'))
        <div class="col-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('alert') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        @endif

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if($reservations->count() != 0)
                    <table id="reservation-table" class="table table-striped table-hover w-100">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col" class="text-uppercase">Reserva</th>
                                <th scope="col" class="text-uppercase">Cancha</th>
                                <th scope="col" class="text-uppercase">Fecha de Reserva</th>
                                <th scope="col" class="text-uppercase">Horario</th>
                                <th scope="col" class="text-uppercase">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservations as $reservation)
                            <tr>
                                <td>{{ $reservation->reservation_id }}</td>
                                <td>
                                    {{ $reservation->matchday->championship->name ?? '-'}}
                                </td>
                                <td>{{ $reservation->field->field_id }}</td>
                                <td>{{ $reservation->reservation_date->format('d/m/Y') }}</td>
                                <td>{{ $reservation->reservation_time->format('H:i') }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('reservation.show', ['reservation' => $reservation->reservation_id]) }}" class="btn btn-sm btn-info text-white text-uppercase me-1">
                                            Ver
                                        </a>
                                        <a href="{{ route('reservation.edit', ['reservation' => $reservation->reservation_id]) }}" class="btn btn-sm btn-warning text-white text-uppercase me-1">
                                            Editar
                                        </a>
                                        <form action="{{ route('reservation.destroy', ['reservation' => $reservation->reservation_id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger text-uppercase">
                                                Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="alert alert-dark" role="alert">
                        No hay Reservas cargadas !
                    </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
    @stop

    {{-- Importacion de Archivos CSS --}}
    @section('css')

    @stop


    {{-- Importacion de Archivos JS --}}
    @section('js')

    @stop