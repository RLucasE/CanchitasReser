<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;



class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::latest() // Ordena de manera DESC por el campo "created_at"
            ->get(); // Convierte los datos extraidos de la BD en un Array

        // Retornamos una vista y enviamos la variable "teams" a la vista
        return view('panel.user.teams_list.index', compact('teams')); // los puntos son los separadores (o accesos a carpetas) se está especificando donde esta el index
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Creamos un Equipo nuevo (que está vacío) para cargarle los datos
        $team = new Team();
        //retornamos la vista de Creacion de Equipos, enviamos el equipo
        return view('panel.user.teams_list.create', compact('team'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $team = new Team();
        $team->name = $request->get('name');
        if ($request->hasFile('logo')) {
            // Subida de imagen al servidor (public > storage)
            $image_url = $request->file('logo')->store('public/team');
            $team->logo = asset(str_replace('public', 'storage', $image_url));
        } else {
            $team->logo = '';
        }
        // Almacena la info del equipo en la BD
        $team->save();

        return redirect()
            ->route('team.index')
            ->with(
                'alert',
                'El equipo "' . $team->name . '" fue agregado exitosamente.'
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        return view('panel.user.teams_list.show', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        $users = User::get();
        return view('panel.user.teams_list.edit', compact('team', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        $team->name = $request->get('name');
        if ($request->hasFile('logo')) {
            // Subida de la imagen nueva al servidor
            $image_url = $request->file('logo')->store('public/team');
            $team->logo = asset(str_replace('public', 'storage', $image_url));
        }
        // Actualiza la info del equipo en la BD
        $team->update();

        return redirect()
            ->route('team.index')
            ->with(
                'alert',
                'El equipo "' . $team->name . '" fue actualizado exitosamente.'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        $team->delete();
        return redirect()
            ->route('team.index')
            ->with(
                'alert',
                'Equipo eliminado exitosamente.'
            );
    }
}
