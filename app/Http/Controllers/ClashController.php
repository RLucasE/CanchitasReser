<?php

namespace App\Http\Controllers;

use App\Models\Clash;
use App\Models\Referee;
use App\Models\Team;
use Illuminate\Http\Request;

class ClashController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clashes = Clash::latest()->get();
        $referees = Referee::latest()->get();
        $teams = Team::latest()->get();
        
        return view('panel.user.clashes_list.index', compact('clashes', 'referees', 'teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clash = new Clash();
        $referees = Referee::get();
        $teams = Team::get();
        
        return view('panel.user.clashes_list.create', compact('clash', 'referees', 'teams'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $clash = new Clash();
        $clash->referee_id = $request->get('referee_id');
        $clash->team_id_home = $request->get('team_id_home');
        $clash->team_id_away = $request->get('team_id_away');
        $clash->goals_home = $request->get('goals_home');
        $clash->goals_away = $request->get('goals_away');
        $clash->status = $request->get('status');

        $clash->save();
        return redirect()
            ->route('clash.index')
            ->with(
                'alert',
                'El Partido fue agregado exitosamente.'
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(Clash $clash)
    {
        $referees = Referee::get();
        $teams = Team::get();
        
        return view('panel.user.clashes_list.show', compact('clash', 'referees', 'teams'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Clash $clash)
    {
        $referees = Referee::get();
        $teams = Team::get();

        return view('panel.user.clashes_list.edit', compact('clash', 'referees', 'teams'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Clash $clash)
    {
        $clash->referee_id = $request->get('referee_id');
        $clash->team_id_home = $request->get('team_id_home');
        $clash->team_id_away = $request->get('team_id_away');
        $clash->goals_home = $request->get('goals_home');
        $clash->goals_away = $request->get('goals_away');
        $clash->status = $request->get('status');

        // Almacena la info del producto en la BD
        $clash->update();
        return redirect()
            ->route('clash.index')
            ->with(
                'alert',
                'El Partido fue actualizado exitosamente.'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Clash $clash)
    {
        $clash->delete();
        return redirect()
            ->route('clash.index')
            ->with(
                'alert',
                'Partido eliminado exitosamente.'
            );
    }

    public function generar_partidos(){
        //Llenar esto xd
        return null;
    }
}
