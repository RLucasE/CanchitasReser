<div class="card mb-5">
    <form action="{{ $leader->leader_id ? route('leader.update', $leader) : route('leader.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @if ($leader->leader_id)
        @method('PUT')
        @endif

        <div class="card-body">

            <div class="mb-3 row">
                <label for="team_id" class="col-sm-4 col-form-label"> * Equipo </label>
                <div class="col-sm-8">
                    <select id="team_id" name="team_id" class="form-control" required>
                        @foreach ($teams as $team)
                        <option {{ $leader->team_id && $leader->team_id == $team->team_id ? 'selected': ''}} value="{{ $team->team_id }}">
                            {{ $team->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="user_id" class="col-sm-4 col-form-label"> * Delegado </label>
                <div class="col-sm-8">
                    <select id="user_id" name="user_id" class="form-control" required>
                        @foreach ($users as $user)
                        <option {{ $leader->user_id && $leader->user_id == $user->id ? 'selected': ''}} value="{{ $user->id }}">
                            {{ $user->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="status" class="col-sm-4 col-form-label"> * Estado </label>
                <div class="col-sm-8">
                <select name="status" class="form-control">
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="amount_owed" class="col-sm-4 col-form-label"> * Saldo </label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="amount_owed" name="amount_owed" value="{{ old('amount_owed', optional($leader)->amount_owed) }}" required>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-success text-uppercase">
                {{ $leader->leader_id ? 'Actualizar' : 'Crear' }}
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