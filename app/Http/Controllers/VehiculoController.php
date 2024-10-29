<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use App\Http\Requests\StoreVehiculoRequest;
use App\Http\Requests\UpdateVehiculoRequest;
use App\Models\Modelo;


class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehiculos=Vehiculo::latest()->paginate(20);
        return view('vehiculos.index', ['vehiculos'=>$vehiculos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $modelos = Modelo::all();
        return view('vehiculos.create', compact('modelos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVehiculoRequest $request)
    {
        $fields = $request->only(['patente', 'chasis','modelo_id']);

        Vehiculo::create($fields);

        return redirect()->route('vehiculos.index')->with('success', 'Vehículo creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehiculo $vehiculo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehiculo $vehiculo)
    {
        $modelos = Modelo::all();
        return view("vehiculos.edit",['vehiculo'=>$vehiculo],compact('modelos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVehiculoRequest $request, Vehiculo $vehiculo)
    {
        $fields = $request->only(['patente', 'chasis','modelo_id']);

        $vehiculo->update($fields);

        return redirect()->route('vehiculos.index')->with('success', 'Vehículo Creado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehiculo $vehiculo)
    {
        $vehiculo->delete();
        return back()->with('success', 'Vehículo eliminado exitosamente.');
    }
}