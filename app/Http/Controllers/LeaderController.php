<?php

namespace App\Http\Controllers;

use App\Models\Leader;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class LeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leaders = Leader::latest()->get();
        $users = User::latest()->get();
        $teams = Team::latest()->get();
        //retornamos una vista y enviamos la variable "championships"
        return view('panel.user.leaders_list.index', compact('leaders', 'users', 'teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $leader = new Leader();
        $users = User::get();
        $teams = Team::get();
        //retornamos una vista y enviamos la variable "championships"
        return view('panel.user.leaders_list.create', compact('leader', 'users', 'teams'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $leader = new Leader();
        $leader->user_id = $request->get('user_id');
        $leader->team_id = $request->get('team_id');
        $leader->status = $request->get('status');
        $leader->amount_owed = $request->get('amount_owed');
        
        // Almacena la info del producto en la BD
        $leader->save();
        return redirect()
            ->route('leader.index')
            ->with(
                'alert',
                'Delegado "' . $leader->user->name . '" fue agregado exitosamente.'
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(Leader $leader)
    {
        $users = User::get();
        $teams = Team::get();
        return view('panel.user.leaders_list.show', compact('leader'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Leader $leader)
    {
        $users = User::get();
        $teams = Team::get();
        return view('panel.user.leaders_list.edit', compact('leader', 'users', 'teams'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Leader $leader)
    {
        $leader->user_id = $request->get('user_id');
        $leader->team_id = $request->get('team_id');
        $leader->status = $request->get('status');
        $leader->amount_owed = $request->get('amount_owed');
        
        // Almacena la info del producto en la BD
        $leader->update();
        return redirect()
            ->route('leader.index')
            ->with(
                'alert',
                'El delegado del equipo "'. $leader->team->name .'" ahora es "' . $leader->user->name . '".'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Leader $leader)
    {
        $leader->delete();
        return redirect()
            ->route('leader.index')
            ->with(
                'alert',
                'Delegado eliminado exitosamente.'
            );
    }
}
