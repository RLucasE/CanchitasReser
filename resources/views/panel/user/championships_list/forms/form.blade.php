<div class="card mb-5">
    <form action="{{ $championship->id ? route('championship.update', $championship) : route('championship.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @if ($championship->id)
        @method('PUT')
        @endif

        <div class="card-body">

            <div class="mb-3 row">
                <img src="{{ $championship->logo ?? 'https://via.placeholder.com/1024'}}" alt="{{ $championship->name }}" id="image_preview" class="img-fluid" style="object-fit: cover; object-position: center; height: 420px; width: 50%;">
            </div>

            <div class="mb-3 row">
                <label for="logo" class="col-sm-4 col-form-label"> * Logo </label>
                <div class="col-sm-8">
                    <input class="form-control" type="file" id="logo" name="logo" accept="image/*" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="nombre" class="col-sm-4 col-form-label"> * Nombre del campeonato </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', optional($championship)->name) }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="start_date" class="col-sm-4 col-form-label"> * Fecha de Inicio </label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date', optional($championship)->start_date) }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="end_date" class="col-sm-4 col-form-label"> * Fecha de Finalización </label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date', optional($championship)->end_date) }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="field_type" class="col-sm-4 col-form-label"> * Tipo de cancha</label>
                <div class="col-sm-8">
                    <select name="field_type" class="form-control">
                        <option value="Futbol 5">Futbol 5</option>
                        <option value="Futbol 8">Futbol 8</option>
                        <option value="Futbol 11">Futbol 11</option>
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="max_number_participants" class="col-sm-4 col-form-label"> * Cantidad de equipos que pueden participar</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="max_number_participants" name="max_number_participants" value="{{ old('max_number_participants', optional($championship)->max_number_participants) }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="gender" class="col-sm-4 col-form-label"> * Tipo de campeonato</label>
                <div class="col-sm-8">
                    <select name="gender" class="form-control">
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-success text-uppercase">
                {{ $championship->id ? 'Actualizar' : 'Crear' }}
            </button>
        </div>
    </form>

</div>

@push('js')
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        const image = document.getElementById('logo');

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