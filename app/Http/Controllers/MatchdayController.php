<?php

namespace App\Http\Controllers;

use App\Models\Championship;
use App\Models\Matchday;
use Illuminate\Http\Request;

class MatchdayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matchdays = Matchday::get();
        $championships = Championship::get();

        return view('panel.user.matchdays_list.index', compact('matchdays', 'championships'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $matchday = new Matchday();
        $championships = Championship::get();
        return view('panel.user.matchdays_list.create', compact('matchday', 'championships'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $matchday = new Matchday();
        $matchday->championship_id = $request->get('championship_id');
        $matchday->matchday_number = $request->get('matchday_number');
        $matchday->start_date = $request->get('start_date');
        $matchday->end_date = $request->get('end_date');
        
        $matchday->save();
        return redirect()
            ->route('matchday.index')
            ->with(
                'alert',
                'La Fecha Número "' . $matchday->matchday_number . '" del campeonato "' . $matchday->championship->name . '" fue creada exitosamente.'
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(Matchday $matchday)
    {
        $championships = Championship::get();
        return view('panel.user.matchdays_list.show', compact('matchday', 'championships'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Matchday $matchday)
    {
        $championships = Championship::get();
        return view('panel.user.matchdays_list.edit', compact('matchday', 'championships'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Matchday $matchday)
    {
        $matchday->championship_id = $request->get('championship_id');
        $matchday->matchday_number = $request->get('matchday_number');
        $matchday->start_date = $request->get('start_date');
        $matchday->end_date = $request->get('end_date');
        
        $matchday->update();
        return redirect()
            ->route('matchday.index')
            ->with(
                'alert',
                'La Fecha Número "' . $matchday->matchday_number . '" del campeonato "' . $matchday->championship->name . '" fue actualizada exitosamente.'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Matchday $matchday)
    {
        $matchday->delete();
        return redirect()
            ->route('matchday.index')
            ->with(
                'alert',
                'Fecha eliminada exitosamente.'
            );
    }
}
