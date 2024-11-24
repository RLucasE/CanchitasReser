{{-- Extiende de la plantilla de Admin LTE, nos permite tener el panel en la vista --}}
@extends('adminlte::page')

{{-- Titulo en las tabulaciones del Navegador --}}
@section('title', 'Equipos')

{{-- Titulo en el contenido de la Pagina --}}
@section('content_header')
<h1>Lista de Equipos</h1>
@stop

{{-- Contenido de la Pagina --}}
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 mb-3">

            <a href="{{ route('team.create') }}" class="btn btn-success text-uppercase">
                Nuevo Equipo
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
                    @if($teams->count() != 0)
                    <table id="teams-table" class="table table-striped table-hover w-100">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col" class="text-uppercase">Logo del Equipo</th>
                                <th scope="col" class="text-uppercase">Nombre del Equipo</th>
                                <!--th scope="col" class="text-uppercase">Delegado</th-->
                                <th scope="col" class="text-uppercase">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teams as $team)
                            <tr>
                                <td>{{ $team->team_id }}</td>
                                <td>
                                    <img src="{{ $team->logo }}" alt="{{ $team->name }}" class="img-fluid" style="width: 150px;">
                                </td>
                                <td>{{ $team->name }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('team.show', ['team' => $team->team_id]) }}" class="btn btn-sm btn-info text-white text-uppercase me-1">
                                            Ver
                                        </a>
                                        <a href="{{ route('team.edit', ['team' => $team->team_id]) }}" class="btn btn-sm btn-warning text-white text-uppercase me-1">
                                            Editar
                                        </a>
                                        <form action="{{ route('team.destroy', ['team' => $team->team_id]) }}" method="POST">
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
                        No hay equipos cargados !
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