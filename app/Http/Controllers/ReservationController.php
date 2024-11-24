<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\Championship;
use App\Models\Clash;
use App\Models\Field;
use App\Models\Matchday;
use App\Models\Payment;
use App\Models\Reservation;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::get();
        $payments = Payment::get();
        $users = User::get();
        $fields = Field::get();
        $matchdays = Matchday::get();
        $championships = Championship::get();

        return view('panel.user.reservations_list.index', compact('reservations', 'payments', 'users', 'fields', 'matchdays', 'championships'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $reservation = new Reservation();
        $payments = Payment::get();
        $users = User::get();
        $fields = Field::get();
        $matchdays = Matchday::get();
        $championships = Championship::get();
        $clashes = Clash::get();

        return view('panel.user.reservations_list.create', compact('reservation', 'payments', 'users', 'fields', 'matchdays', 'championships', 'clashes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $reservation = new Reservation();
        $reservation->field_id = $request->get('field_id');
        $reservation->payment_id = $request->get('payment_id');
        $reservation->matchday_id = $request->get('matchday_id');
        $reservation->clash_id = $request->get('clash_id');
        $reservation->reservation_date = $request->get('reservation_date');
        $reservation->reservation_time = $request->get('reservation_time');

        $reservation->save();
        return redirect()
            ->route('reservation.index')
            ->with(
                'alert',
                'La Reserva fue agregada exitosamente.'
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        $payments = Payment::get();
        $users = User::get();
        $fields = Field::get();
        $matchdays = Matchday::get();
        $championships = Championship::get();

        return view('panel.user.reservations_list.show', compact('reservation', 'payments', 'users', 'fields', 'matchdays', 'championships'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        $payments = Payment::get();
        $users = User::get();
        $fields = Field::get();
        $matchdays = Matchday::get();
        $championships = Championship::get();
        $clashes = Clash::get();

        return view('panel.user.reservations_list.edit', compact('reservation', 'payments', 'users', 'fields', 'matchdays', 'championships', 'clashes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        $reservation->field_id = $request->get('field_id');
        $reservation->payment_id = $request->get('payment_id');
        $reservation->matchday_id = $request->get('matchday_id');
        $reservation->clash_id = $request->get('clash_id');
        $reservation->reservation_date = $request->get('reservation_date');
        $reservation->reservation_time = $request->get('reservation_time');

        $reservation->update();

        $data = array(
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
            'nro_reserva' => $reservation->reservation_id,
            'campeonato' => $reservation->matchday->championship->name,
            'numero_de_fecha' => $reservation->matchday->matchday_number,
            'equipo_local' => $reservation->clash->homeTeam->name,
            'equipo_visitante' => $reservation->clash->awayTeam->name,
            'fecha_reserva' => $reservation->reservation_date->format('d/m/Y'),
            'hora' => $reservation->reservation_time->format('H:i'),
        );
        //Enviando Mail al email dentro de $data
        Mail::to($data['email'])->send(new SendMail($data));

        return redirect()
            ->route('reservation.index')
            ->with(
                'alert',
                'La Reserva fue actualizada exitosamente.'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()
            ->route('reservation.index')
            ->with(
                'alert',
                'Reserva eliminada exitosamente.'
            );
    }

    public function generatePDF(){
        $data = [
            'title' => 'Lista de Reservas',
            'reservations' => Reservation::get(), 
            ];
            
            $pdf = Pdf::loadView('panel.user.reservations_list.lista_reservas', $data);
            
            return $pdf->download('lista_reservas_' . now()->format('d_m_Y') .'.pdf');
           
    }
}
