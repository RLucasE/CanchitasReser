<?php

namespace App\Http\Controllers;

use App\Models\Championship;
use Illuminate\Http\Request;

class ChampionshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $championships = Championship::latest()->get();

        //retornamos una vista y enviamos la variable "championships"
        return view('panel.user.championships_list.index', compact('championships'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Creamos un Producto nuevo para cargarle datos
        $championship = new Championship();

        // Retornamos la vista de creación de productos, enviamos el producto y las categorías
        return view('panel.user.championships_list.create', compact('championship'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $championship = new Championship();
        $championship->name = $request->get('name');
        $championship->start_date = $request->get('start_date');
        $championship->end_date = $request->get('end_date');
        $championship->gender = $request->get('gender');
        $championship->max_number_participants = $request->get('max_number_participants');
        $championship->field_type = $request->get('field_type');
        if ($request->hasFile('logo')) {
            // Subida de imagen al servidor (public > storage)
            $image_url = $request->file('logo')->store('public/championship');
            $championship->logo = asset(str_replace('public', 'storage', $image_url));
        } else {
            $championship->logo = '';
        }
        // Almacena la info del producto en la BD
        $championship->save();
        return redirect()
            ->route('championship.index')
            ->with(
                'alert',
                'Campeonato "' . $championship->name . '" fue agregado exitosamente.'
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(Championship $championship)
    {
        return view('panel.user.championships_list.show', compact('championship'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Championship $championship)
    {
        return view('panel.user.championships_list.edit', compact('championship'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Championship $championship)
    {
        $championship->name = $request->get('name');
        $championship->start_date = $request->get('start_date');
        $championship->end_date = $request->get('end_date');
        $championship->gender = $request->get('gender');
        $championship->max_number_participants = $request->get('max_number_participants');
        $championship->field_type = $request->get('field_type');
        if ($request->hasFile('logo')) {
            // Subida de imagen al servidor (public > storage)
            $image_url = $request->file('logo')->store('public/championship');
            $championship->logo = asset(str_replace('public', 'storage', $image_url));
        } else {
            $championship->logo = '';
        }
        // Almacena la info del producto en la BD
        $championship->update();
        return redirect()
            ->route('championship.index')
            ->with(
                'alert',
                'Campeonato "' . $championship->name . '" fue actualizado exitosamente.'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Championship $championship)
    {
        $championship->delete();
        return redirect()
            ->route('championship.index')
            ->with(
                'alert',
                'Campeonato eliminado exitosamente.'
            );
    }
}
