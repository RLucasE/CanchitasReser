<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $players = Player::latest()->get();
        $teams = Team::get();

        //retornamos una vista y enviamos la variable "championships"
        return view('panel.user.players_list.index', compact('players', 'teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $player = new Player();
        $teams = Team::get();
        return view('panel.user.players_list.create', compact('player', 'teams'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $player = new Player();
        $player->name = $request->get('name');
        $player->dni = $request->get('dni');
        $player->gender = $request->get('gender');
        $player->phone = $request->get('phone');
        $player->birthdate = $request->get('birthdate');
        $player->age = 18;
        $player->team_id = $request->get('team_id');
        if ($request->hasFile('photo')) {
            // Subida de imagen al servidor (public > storage)
            $image_url = $request->file('photo')->store('public/player');
            $player->photo = asset(str_replace('public', 'storage', $image_url));
        } else {
            $player->photo = '';
        }
        // Almacena la info del producto en la BD
        $player->save();
        return redirect()
            ->route('player.index')
            ->with(
                'alert',
                'Jugador "' . $player->name . '" fue agregado exitosamente.'
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(Player $player)
    {
        return view('panel.user.players_list.show', compact('player'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Player $player)
    {
        $teams = Team::get();
        return view('panel.user.players_list.edit', compact('player', 'teams'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Player $player)
    {
        $player->name = $request->get('name');
        $player->dni = $request->get('dni');
        $player->gender = $request->get('gender');
        $player->phone = $request->get('phone');
        $player->birthdate = $request->get('birthdate');
        $player->age = 18;
        $player->team_id = $request->get('team_id');
        if ($request->hasFile('photo')) {
            // Subida de imagen al servidor (public > storage)
            $image_url = $request->file('photo')->store('public/player');
            $player->photo = asset(str_replace('public', 'storage', $image_url));
        } else {
            $player->photo = '';
        }
        // Almacena la info del producto en la BD
        $player->update();
        return redirect()
            ->route('player.index')
            ->with(
                'alert',
                'Jugador "' . $player->name . '" fue actualizado exitosamente.'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Player $player)
    {
        $player->delete();
        return redirect()
            ->route('player.index')
            ->with(
                'alert',
                'Jugador eliminado exitosamente.'
            );
    }
}
