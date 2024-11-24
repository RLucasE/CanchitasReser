<?php

namespace App\Http\Controllers;

use App\Models\Field;
use Illuminate\Http\Request;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fields = Field::latest()->get();

        return view('panel.user.fields_list.index', compact('fields'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $field = new Field();
        return view('panel.user.fields_list.create', compact('field'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $field = new Field();
        $field->capacity = $request->get('capacity');
        $field->price = $request->get('price');
        if ($request->hasFile('photo')) {
            // Subida de imagen al servidor (public > storage)
            $image_url = $request->file('photo')->store('public/field');
            $field->photo = asset(str_replace('public', 'storage', $image_url));
        } else {
            $field->photo = '';
        }
        // Almacena la info del producto en la BD
        $field->save();
        return redirect()
            ->route('field.index')
            ->with(
                'alert',
                'Cancha "' . $field->field_id . '" fue agregada exitosamente.'
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(Field $field)
    {
        return view('panel.user.fields_list.show', compact('field'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Field $field)
    {
        return view('panel.user.fields_list.edit', compact('field'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Field $field)
    {
        $field->capacity = $request->get('capacity');
        $field->price = $request->get('price');
        if ($request->hasFile('photo')) {
            // Subida de imagen al servidor (public > storage)
            $image_url = $request->file('photo')->store('public/field');
            $field->photo = asset(str_replace('public', 'storage', $image_url));
        } else {
            $field->photo = '';
        }
        // Almacena la info del producto en la BD
        $field->update();
        return redirect()
            ->route('field.index')
            ->with(
                'alert',
                'Cancha "' . $field->field_id . '" fue agregada exitosamente.'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Field $field)
    {
        $field->delete();
        return redirect()
            ->route('field.index')
            ->with(
                'alert',
                'Cancha eliminada exitosamente.'
            );
    }
}
