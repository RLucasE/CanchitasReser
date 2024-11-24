<div class="card mb-5">
    <form action="{{ $player->id ? route('player.update', $player) : route('player.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @if ($player->id)
        @method('PUT')
        @endif

        <div class="card-body">

            <div class="mb-3 row">
                <img src="{{ $player->photo ?? 'https://via.placeholder.com/1024'}}" alt="{{ $player->name }}" id="image_preview" class="img-fluid" style="object-fit: cover; object-position: center; height: 420px; width: 50%;">
            </div>

            <div class="mb-3 row">
                <label for="photo" class="col-sm-4 col-form-label"> * Foto </label>
                <div class="col-sm-8">
                    <input class="form-control" type="file" id="photo" name="photo" accept="image/*" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="name" class="col-sm-4 col-form-label"> * Nombre del jugador </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', optional($player)->name) }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="dni" class="col-sm-4 col-form-label"> * DNI </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="dni" name="dni" value="{{ old('dni', optional($player)->dni) }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="gender" class="col-sm-4 col-form-label"> * Género</label>
                <div class="col-sm-8">
                    <select name="gender" class="form-control">
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="phone" class="col-sm-4 col-form-label"> * Teléfono </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', optional($player)->phone) }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="birthdate" class="col-sm-4 col-form-label"> * Fecha de Nac.</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" id="birthdate" name="birthdate" value="{{ old('birthdate', optional($player)->birthdate) }}" required>
                </div>
            </div>


            <!-- PONER EL TEAM AL QUE PERTENECE-->

            <div class="mb-3 row">
                <label for="team_id" class="col-sm-4 col-form-label"> * Equipo al que pertenece </label>
                <div class="col-sm-8">
                    <select id="team_id" name="team_id" class="form-control" required>
                        @foreach ($teams as $team)
                        <option {{ $player->team_id && $player->team_id == $team->team_id ? 'selected': ''}} value="{{ $team->team_id }}">
                            {{ $team->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>



        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-success text-uppercase">
                {{ $player->player_id ? 'Actualizar' : 'Crear' }}
            </button>
        </div>
    </form>

</div>

@push('js')
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        const image = document.getElementById('photo');

        image.addEventListener('change', (e) => {

            const input = e.target;
            const imagePreview = document.querySelector('#image_preview');

            if (!input.files.length) return

            file = input.files[0];
            objectURL = URL.createObjectURL(file);
            imagePreview.src = objectURL;
        });
    });
</script>
@endpush