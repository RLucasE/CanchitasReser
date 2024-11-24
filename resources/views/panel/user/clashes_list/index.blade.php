{{-- Extiende de la plantilla de Admin LTE, nos permite tener el panel en la vista --}}
@extends('adminlte::page')

{{-- Titulo en las tabulaciones del Navegador --}}
@section('title', 'Partidos')

{{-- Titulo en el contenido de la Pagina --}}
@section('content_header')
<h1>Lista de Partidos</h1>
@stop

{{-- Contenido de la Pagina --}}
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 mb-3">

            <a href="{{ route('clash.create') }}" class="btn btn-success text-uppercase">
                Nuevo Partido
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
                    @if($clashes->count() != 0)
                    <table id="clash-table" class="table table-striped table-hover w-100">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col" class="text-uppercase">Equipo Local</th>
                                <th scope="col" class="text-uppercase">Resultado</th>
                                <th scope="col" class="text-uppercase">Equipo Visitante</th>
                                <th scope="col" class="text-uppercase">Estado</th>
                                <th scope="col" class="text-uppercase">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clashes as $clash)
                            <tr>
                                <td>{{ $clash->clash_id }}</td>
                                <td>{{ $clash->homeTeam->name }} <img src="{{ $clash->homeTeam->logo }}" class="img-fluid img-thumbnail" alt="..." style="width: 50px; height: 50px;"></td>
                                <td style="text-align: left;">{{ $clash->goals_home ?? ''}} - {{ $clash->goals_away ?? ''}}</td>
                                <td><img src="{{ $clash->awayTeam->logo }}" class="img-fluid img-thumbnail" alt="..." style="width: 50px; height: 50px;"> {{ $clash->awayTeam->name }}</td>
                                <td>{{ $clash->status }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('clash.show', ['clash' => $clash->clash_id]) }}" class="btn btn-sm btn-info text-white text-uppercase me-1">
                                            Ver
                                        </a>
                                        <a href="{{ route('clash.edit', ['clash' => $clash->clash_id]) }}" class="btn btn-sm btn-warning text-white text-uppercase me-1">
                                            Editar
                                        </a>
                                        <form action="{{ route('clash.destroy', ['clash' => $clash->clash_id]) }}" method="POST">
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
                        No hay Partidos cargados !
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