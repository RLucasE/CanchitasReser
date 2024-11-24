<div class="card mb-5">
    <form action="{{ $field->field_id ? route('field.update', $field) : route('field.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @if ($field->field_id)
        @method('PUT')
        @endif

        <div class="card-body">

            <div class="mb-3 row">
                <img src="{{ $field->photo ?? 'https://via.placeholder.com/1024'}}" alt="{{ $field->field_id }}" id="image_preview" class="img-fluid" style="object-fit: cover; object-position: center; height: 420px; width: 50%;">
            </div>

            <div class="mb-3 row">
                <label for="photo" class="col-sm-4 col-form-label"> * Foto </label>
                <div class="col-sm-8">
                    <input class="form-control" type="file" id="photo" name="photo" accept="image/*" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="capacity" class="col-sm-4 col-form-label"> * Capacidad</label>
                <div class="col-sm-8">
                    <select name="capacity" class="form-control">
                        <option value="Fútbol 5">Fútbol 5</option>
                        <option value="Fútbol 8">Fútbol 8</option>
                        <option value="Fútbol 11">Fútbol 11</option>
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="price" class="col-sm-4 col-form-label"> * Precio </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="price" name="price" value="{{ old('price', optional($field)->price) }}" required>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-success text-uppercase">
                {{ $field->field_id ? 'Actualizar' : 'Crear' }}
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