<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Http\Requests\StoreEquipoRequest;
use App\Http\Requests\UpdateEquipoRequest;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipos = Equipo::where('estado', true)->latest()->paginate(20);
        return view('equipos.index', ['equipos' => $equipos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('equipos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEquipoRequest $request)
    {
        $fields = $request->only(['nombre']);
        $fields['estado'] = true;
        Equipo::create($fields);

        return redirect()->route('equipos.index')->with('success', 'Equipo agregado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Equipo $equipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipo $equipo)
    {
        return view("equipos.edit",['cliente'=>$equipo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEquipoRequest $request, Equipo $equipo)
    {
        $fields = $request->only(['nombre']);
    
        $equipo->update($fields);

        return redirect()->route('clientes.index')->with('success', 'Equipo editado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipo $equipo)
    {
        $equipo->update(['estado' => false]);
        return back()->with('success', 'Equipo Eliminado exitosamente.');
    }
}
