<?php

namespace App\Http\Controllers;

use App\Models\Championship;
use App\Models\Inscription;
use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inscriptions = Inscription::latest()->get();
        $championships = Championship::latest()->get();

        return view('panel.user.inscriptions_list.index', compact('inscriptions', 'championships'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $inscription = new Inscription();
        $championships = Championship::get();
        return view('panel.user.inscriptions_list.create', compact('inscription', 'championships'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inscription = new Inscription();
        $inscription->championship_id = $request->get('championship_id');
        $inscription->inscription_date = date("Y-m-d");
        $inscription->price = $request->get('price');
        // Almacena la info del producto en la BD
        $inscription->save();
        return redirect()
            ->route('inscription.index')
            ->with(
                'alert',
                'La Incripción del campeonato "' . $inscription->championship->name . '" fue agregada exitosamente.'
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(Inscription $inscription)
    {
        $championships = Championship::get();
        return view('panel.user.inscriptions_list.show', compact('inscription', 'championships'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inscription $inscription)
    {
        $championships = Championship::get();
        return view('panel.user.inscriptions_list.edit', compact('inscription', 'championships'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inscription $inscription)
    {
        $inscription->championship_id = $request->get('championship_id');
        $inscription->inscription_date = date("Y-m-d"); // Guardamos la fecha actual en la Fecha de Inscripción
        $inscription->price = $request->get('price');
        
        // Almacena la info del producto en la BD
        $inscription->update();
        return redirect()
            ->route('inscription.index')
            ->with(
                'alert',
                'La Inscripcion del campeonato"' . $inscription->championship->name . '" fue actualizada exitosamente.'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inscription $inscription)
    {
        $inscription->delete();
        return redirect()
            ->route('inscription.index')
            ->with(
                'alert',
                'Inscripción eliminada exitosamente.'
            );
    }
}
