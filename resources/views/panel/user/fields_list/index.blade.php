{{-- Extiende de la plantilla de Admin LTE, nos permite tener el panel en la vista --}}
@extends('adminlte::page')

{{-- Titulo en las tabulaciones del Navegador --}}
@section('title', 'Canchas')

{{-- Titulo en el contenido de la Pagina --}}
@section('content_header')
<h1>Lista de Jugadores</h1>
@stop

{{-- Contenido de la Pagina --}}
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 mb-3">

            <a href="{{ route('field.create') }}" class="btn btn-success text-uppercase">
                Nueva Cancha
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
                @if($fields->count() != 0)
                    <table id="field-table" class="table table-striped table-hover w-100">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col" class="text-uppercase">Foto</th>
                                <th scope="col" class="text-uppercase">Capacidad</th>
                                <th scope="col" class="text-uppercase">Precio</th>
                                <th scope="col" class="text-uppercase">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($fields as $field)
                            <tr>
                                <td>{{ $field->field_id }}</td>
                                <td>
                                    <img src="{{ $field->photo }}" alt="{{ $field->field_id }}" class="img-fluid" style="width: 150px;">
                                </td>
                                <td>{{ $field->capacity }}</td>
                                <td>{{ $field->price }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('field.show', ['field' => $field->field_id]) }}" class="btn btn-sm btn-info text-white text-uppercase me-1">
                                            Ver
                                        </a>
                                        <a href="{{ route('field.edit', ['field' => $field->field_id]) }}" class="btn btn-sm btn-warning text-white text-uppercase me-1">
                                            Editar
                                        </a>
                                        <form action="{{ route('field.destroy', ['field' => $field->field_id]) }}" method="POST">
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
                        No hay Canchas cargadas !
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