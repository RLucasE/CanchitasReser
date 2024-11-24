<div class="card mb-5">
    <form action="{{ $inscription->inscription_id ? route('inscription.update', $inscription) : route('inscription.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @if ($inscription->inscription_id)
        @method('PUT')
        @endif

        <div class="card-body">

            <!-- PONER la FOTo dEL CAMPEONATO -->

            <!-- PONER EL CAMPEONATO AL QUE PERTENECE-->

            <div class="mb-3 row">
                <label for="championship_id" class="col-sm-4 col-form-label"> * Inscripción para el campeonato</label>
                <div class="col-sm-8">
                    <select id="championship_id" name="championship_id" class="form-control" required>
                        @foreach ($championships as $championship)
                        <option {{ $inscription->championship_id && $inscription->championship_id == $championship->championship_id ? 'selected': ''}} value="{{ $championship->championship_id }}">
                            {{ $championship->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- La fecha de la inscripcion se completa sola en el controlador de inscripciones -->

            <div class="mb-3 row">
                <label for="price" class="col-sm-4 col-form-label"> * Precio </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="price" name="price" value="{{ old('price', optional($inscription)->price) }}" required>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-success text-uppercase">
                {{ $inscription->inscription_id ? 'Actualizar' : 'Crear' }}
            </button>
        </div>
    </form>

</div>
