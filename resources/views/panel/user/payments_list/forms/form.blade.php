<div class="card mb-5">
    <form action="{{ $payment->payment_id ? route('payment.update', $payment) : route('payment.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @if ($payment->payment_id)
        @method('PUT')
        @endif

        <div class="card-body">

            <div class="mb-3 row">
                <label for="user_id" class="col-sm-4 col-form-label"> * Usuario </label>
                <div class="col-sm-8">
                    <select id="user_id" name="user_id" class="form-control" >
                        <option value=""></option>
                        @foreach ($users as $user)
                        <option {{ $payment->user_id && $payment->user_id == $user->id ? 'selected': ''}} value="{{ $user->id }}">
                            {{ $user->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="leader_id" class="col-sm-4 col-form-label"> * Delegado </label>
                <div class="col-sm-8">
                    <select id="leader_id" name="leader_id" class="form-control" >
                        <option value=""></option>
                        @foreach ($leaders as $leader)
                        <option {{ $payment->leader_id && $payment->leader_id == $leader->id ? 'selected': ''}} value="{{ $leader->leader_id }}">
                            {{ $leader->user->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="inscription_id" class="col-sm-4 col-form-label"> * Nombre del campeonato al que se inscribe </label>
                <div class="col-sm-8">
                    <select id="inscription_id" name="inscription_id" class="form-control">
                        @foreach ($inscriptions as $inscription)
                        <option {{ $payment->inscription_id && $payment->inscription_id == $inscription->inscription_id ? 'selected': ''}} value="{{ $inscription->inscription_id }}">
                            {{ $inscription->championship->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-success text-uppercase">
                {{ $payment->payment_id ? 'Actualizar' : 'Crear' }}
            </button>
        </div>
    </form>

</div>