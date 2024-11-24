<div class="card mb-5">
    <form action="{{ $clash->clash_id ? route('clash.update', $clash) : route('clash.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @if ($clash->clash_id)
        @method('PUT')
        @endif

        <div class="card-body">

            <div class="mb-3 row">
                <label for="team_id_home" class="col-sm-4 col-form-label"> * Equipo Local </label>
                <div class="col-sm-8">
                    <select id="team_id_home" name="team_id_home" class="form-control">
                        @foreach ($teams as $team)
                        <option {{ $clash->team_id_home && $clash->team_id_home == $team->team_id ? 'selected': ''}} value="{{ $team->team_id }}">
                            {{ $team->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="team_id_away" class="col-sm-4 col-form-label"> * Equipo Visitante </label>
                <div class="col-sm-8">
                    <select id="team_id_away" name="team_id_away" class="form-control">
                        @foreach ($teams as $team)
                        <option {{ $clash->team_id_away && $clash->team_id_away == $team->team_id ? 'selected': ''}} value="{{ $team->team_id }}">
                            {{ $team->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="referee_id" class="col-sm-4 col-form-label"> * Árbitro </label>
                <div class="col-sm-8">
                    <select id="referee_id" name="referee_id" class="form-control">
                        <option value=""></option>
                        @foreach ($referees as $referee)
                        <option {{ $clash->referee_id && $clash->referee_id == $referee->referee_id ? 'selected': ''}} value="{{ $referee->referee_id }}">
                            {{ $referee->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="goals_home" class="col-sm-4 col-form-label"> * Goles del Equipo Local </label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="goals_home" name="goals_home" value="{{ old('goals_home', optional($clash)->goals_home) }}" >
                </div>
            </div>

            <div class="mb-3 row">
                <label for="goals_away" class="col-sm-4 col-form-label"> * Goles del Equipo Visitante </label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="goals_away" name="goals_away" value="{{ old('goals_away', optional($clash)->goals_away) }}" >
                </div>
            </div>

            <div class="mb-3 row">
                <label for="status" class="col-sm-4 col-form-label"> * Estado del partido </label>
                <div class="col-sm-8">
                    <select name="status" class="form-control">
                        <option value="Por Jugarse">Por Jugarse</option>
                        <option value="En Juego">En Juego</option>
                        <option value="Suspendido">Suspendido</option>
                        <option value="Finalizado">Finalizado</option>

                    </select>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-success text-uppercase">
                {{ $clash->clash_id ? 'Actualizar' : 'Crear' }}
            </button>
        </div>
    </form>

</div>