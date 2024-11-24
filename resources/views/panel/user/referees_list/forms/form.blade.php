<div class="card mb-5">
    <form action="{{ $referee->referee_id ? route('referee.update', $referee) : route('referee.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @if ($referee->referee_id)
        @method('PUT')
        @endif

        <div class="card-body">

            <div class="mb-3 row">
                <label for="name" class="col-sm-4 col-form-label"> * Nombre del jugador </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', optional($referee)->name) }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="dni" class="col-sm-4 col-form-label"> * DNI </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="dni" name="dni" value="{{ old('dni', optional($referee)->dni) }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="phone" class="col-sm-4 col-form-label"> * Teléfono </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', optional($referee)->phone) }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="birthdate" class="col-sm-4 col-form-label"> * Fecha de Nac.</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" id="birthdate" name="birthdate" value="{{ old('birthdate', optional($referee)->birthdate) }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="address" class="col-sm-4 col-form-label"> * Domicilio </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address', optional($referee)->address) }}" required>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-success text-uppercase">
                {{ $referee->referee_id ? 'Actualizar' : 'Crear' }}
            </button>
        </div>
    </form>

</div>
