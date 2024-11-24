<div class="card mb-5">
    <form action="{{ $reservation->reservation_id ? route('reservation.update', $reservation) : route('reservation.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @if ($reservation->reservation_id)
        @method('PUT')
        @endif

        <div class="card-body">

            <div class="mb-3 row">
                <label for="field_id" class="col-sm-4 col-form-label"> * Cancha </label>
                <div class="col-sm-8">
                    <select id="field_id" name="field_id" class="form-control">
                        @foreach ($fields as $field)
                        <option {{ $reservation->field_id && $reservation->field_id == $field->field_id ? 'selected': ''}} value="{{ $field->field_id }}">
                            {{ $field->field_id }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="payment_id" class="col-sm-4 col-form-label"> *Pago hecho por la persona  </label>
                <div class="col-sm-8">
                    <select id="payment_id" name="payment_id" class="form-control">
                        <option value=""></option>
                        @foreach ($payments as $payment)
                        @if( $payment->user_id != null)
                        <option {{ $reservation->payment_id && $reservation->payment_id == $payment->payment_id ? 'selected': ''}} value="{{ $payment->payment_id }}">
                            {{ $payment->user->name }}
                        </option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="matchday_id" class="col-sm-4 col-form-label"> * Fecha Nro. </label>
                <div class="col-sm-8">
                    <select id="matchday_id" name="matchday_id" class="form-control">
                        <option value=""></option>
                        @foreach ($matchdays as $matchday)
                        <option {{ $reservation->matchday_id && $reservation->matchday_id == $matchday->matchday_id ? 'selected': ''}} value="{{ $matchday->matchday_id }}">
                            {{ $matchday->matchday_number }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="clash_id" class="col-sm-4 col-form-label"> * Partido </label>
                <div class="col-sm-8">
                    <select id="clash_id" name="clash_id" class="form-control">
                        @foreach ($clashes as $clash)
                        <option {{ $reservation->clash_id && $reservation->clash_id == $clash->clash_id ? 'selected': ''}} value="{{ $clash->clash_id }}">
                            {{ $clash->homeTeam->name }} - {{ $clash->awayTeam->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="reservation_date" class="col-sm-4 col-form-label"> * Fecha de la Reserva </label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" id="reservation_date" name="reservation_date" value="{{ old('reservation_date', optional($reservation)->reservation_date) }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="reservation_time" class="col-sm-4 col-form-label"> * Hora de la Reserva </label>
                <div class="col-sm-8">
                    <input type="time" class="form-control" id="reservation_time" name="reservation_time" value="{{ old('reservation_time', optional($reservation)->reservation_time) }}" required>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-success text-uppercase">
                {{ $reservation->reservation_id ? 'Actualizar' : 'Crear' }}
            </button>
        </div>
    </form>

</div>