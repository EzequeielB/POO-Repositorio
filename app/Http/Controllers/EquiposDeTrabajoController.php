<?php

namespace App\Http\Controllers;

use App\Models\EquiposDeTrabajo;
use App\Http\Requests\StoreEquiposDeTrabajoRequest;
use App\Http\Requests\UpdateEquiposDeTrabajoRequest;
use App\Models\Vehiculo;
use App\Models\Equipo;
use App\Models\Tecnico;

class EquiposDeTrabajoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equiposdetrabajo=EquiposDeTrabajo::latest()->paginate(20);
        return view('equiposDeTrabajo.index', ['equiposdetrabajo'=>$equiposdetrabajo]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $equipos = Equipo::where('estado', true)->get();
        $tecnicos = Tecnico::where('estado', true)->get();
        $vehiculos = Vehiculo::all();
        return view('equiposDeTrabajo.create', compact('equipos','tecnicos','vehiculos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEquiposDeTrabajoRequest $request)
    {
        $fields = $request->only(['vehiculo_id', 'equipo_id','tecnico_id']);

        EquiposDeTrabajo::create($fields);

        return redirect()->route('equiposdetrabajo.index')->with('success', 'Equipo de Trabajo creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(EquiposDeTrabajo $equiposDeTrabajo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EquiposDeTrabajo $equiposDeTrabajo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEquiposDeTrabajoRequest $request, EquiposDeTrabajo $equiposDeTrabajo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EquiposDeTrabajo $equiposDeTrabajo)
    {
        $equiposDeTrabajo->delete();
        return back()->with('success', 'Equipo de Trabajo eliminado exitosamente.');
    }
}
