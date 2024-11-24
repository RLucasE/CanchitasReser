<?php

namespace App\Http\Controllers;

use App\Models\Referee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RefereeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $referees = Referee::latest()->get();
        return view('panel.user.referees_list.index', compact('referees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $referee = new Referee();
        return view('panel.user.referees_list.create', compact('referee'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $referee = new Referee();
        $referee->name = $request->get('name');
        $referee->dni = $request->get('dni');
        $referee->phone = $request->get('phone');
        $referee->birthdate = $request->get('birthdate');

        //Calculando la edad
        $birthDate = Carbon::parse($request->get('birthdate'));
        $age = $birthDate->age; // Obtiene la edad automáticamente

        $referee->age = $age;
        $referee->address = $request->get('address');

        $referee->save();
        return redirect()
            ->route('referee.index')
            ->with(
                'alert',
                'Arbitro "' . $referee->name . '" fue actualizado exitosamente.'
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(Referee $referee)
    {
        return view('panel.user.referees_list.show', compact('referee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Referee $referee)
    {
        return view('panel.user.referees_list.edit', compact('referee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Referee $referee)
    {
        $referee->name = $request->get('name');
        $referee->dni = $request->get('dni');
        $referee->phone = $request->get('phone');
        $referee->birthdate = $request->get('birthdate');
        
        //Calculando la edad
        $birthDate = Carbon::parse($request->get('birthdate'));
        $age = $birthDate->age; // Obtiene la edad automáticamente

        $referee->age = $age;
        $referee->address = $request->get('address');

        $referee->update();
        return redirect()
            ->route('referee.index')
            ->with(
                'alert',
                'Arbitro "' . $referee->name . '" fue actualizado exitosamente.'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Referee $referee)
    {
        $referee->delete();
        return redirect()
            ->route('referee.index')
            ->with(
                'alert',
                'Arbitro eliminado exitosamente.'
            );
    }
}
