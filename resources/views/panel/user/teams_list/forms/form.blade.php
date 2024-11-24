<div class="card mb-5">
    <form action="{{ $team->team_id ? route('team.update', $team) : route('team.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        @if ($team->team_id)
            @method('PUT')
        @endif

        <div class="card-body">

            <div class="mb-3 row">
                <img src="{{ $team->logo ?? 'https://via.placeholder.com/1024'}}" alt="{{ $team->name }}" id="image_preview" class="img-fluid" style="object-fit: cover; object-position: center; height: 420px; width: 100%;">
            </div>

            <div class="mb-3 row">
                <label for="logo" class="col-sm-4 col-form-label"> * Logo </label>
                <div class="col-sm-8">
                    <input class="form-control" type="file" id="logo" name="logo" accept="logo/*" required>
                </div>
            </div>
            
            <div class="mb-3 row">
                <label for="name" class="col-sm-4 col-form-label"> * Nombre del Equipo </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', optional($team)->name) }}" required>
                </div>
            </div>
        
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-success text-uppercase">
                {{ $team->team_id ? 'Actualizar' : 'Crear' }}
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
                
                if(!input.files.length) return

                file = input.files[0];
                objectURL = URL.createObjectURL(file);
                imagePreview.src = objectURL;
            });
        });
    </script>
@endpush