<?php

namespace App\Http\Controllers;

use App\Models\Championship;
use App\Models\Inscription;
use App\Models\Leader;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::latest()->get();
        $users = User::latest()->get();
        $leaders = Leader::latest()->get();
        $inscriptions = Inscription::latest()->get();
        $championships = Championship::latest()->get();
        
        return view('panel.user.payments_list.index', compact('payments', 'users', 'leaders', 'inscriptions', 'championships'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $payment = new Payment();
        $users = User::get();
        $leaders = Leader::get();
        $inscriptions = Inscription::get();
        $championships = Championship::get();
        
        return view('panel.user.payments_list.create', compact('payment', 'users', 'leaders', 'inscriptions', 'championships'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $payment = new Payment();
        $payment->user_id = $request->get('user_id');
        $payment->leader_id = $request->get('leader_id');
        $payment->inscription_id = $request->get('inscription_id');
        $payment->payment_date = date("Y-m-d");

        // Almacena la info del producto en la BD
        $payment->save();
        return redirect()
            ->route('payment.index')
            ->with(
                'alert',
                //poner... el pago realizado por "tal persona" fue agregada exitosamente
                'El pago "' . $payment->payment_id . '" fue agregado exitosamente.'
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        $users = User::get();
        $leaders = Leader::get();
        $inscriptions = Inscription::get();
        $championships = Championship::get();

        return view('panel.user.payments_list.show', compact('payments', 'users', 'leaders', 'inscriptions', 'championships'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        $users = User::get();
        $leaders = Leader::get();
        $inscriptions = Inscription::get();
        $championships = Championship::get();

        return view('panel.user.payments_list.edit', compact('payment', 'users', 'leaders', 'inscriptions', 'championships'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        $payment->user_id = $request->get('user_id');
        $payment->leader_id = $request->get('leader_id');
        $payment->inscription_id = $request->get('inscription_id');
        $payment->payment_date = date("Y-m-d");

        // Almacena la info del producto en la BD
        $payment->update();
        return redirect()
            ->route('payment.index')
            ->with(
                'alert',
                'El pago nro "' . ($payment->payment_id) . '" se actualizó exitosamente".'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()
            ->route('payment.index')
            ->with(
                'alert',
                'Pago eliminado exitosamente.'
            );
    }
}
