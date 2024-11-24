<div class="card mb-5">
    <form action="{{ $matchday->matchday_id ? route('matchday.update', $matchday) : route('matchday.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @if ($matchday->matchday_id)
        @method('PUT')
        @endif

        <div class="card-body">

            <!-- PONER EL CAMPEONATO AL QUE PERTENECE-->

            <div class="mb-3 row">
                <label for="championship_id" class="col-sm-4 col-form-label"> * Fecha para el campeonato</label>
                <div class="col-sm-8">
                    <select id="championship_id" name="championship_id" class="form-control" required>
                        @foreach ($championships as $championship)
                        <option {{ $matchday->championship_id && $matchday->championship_id == $championship->championship_id ? 'selected': ''}} value="{{ $championship->championship_id }}">
                            {{ $championship->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="matchday_number" class="col-sm-4 col-form-label"> * Fecha Nro. </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="matchday_number" name="matchday_number" value="{{ old('matchday_number', optional($matchday)->matchday_number) }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="start_date" class="col-sm-4 col-form-label"> * Fecha de Inicio</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date', optional($matchday)->start_date) }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="end_date" class="col-sm-4 col-form-label"> * Fecha de Finalización</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date', optional($matchday)->end_date) }}" required>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-success text-uppercase">
                {{ $matchday->matchday_id ? 'Actualizar' : 'Crear' }}
            </button>
        </div>
    </form>

</div>
