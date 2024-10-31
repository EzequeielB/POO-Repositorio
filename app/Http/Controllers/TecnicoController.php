<?php

namespace App\Http\Controllers;

use App\Models\Tecnico;
use App\Http\Requests\StoreTecnicoRequest;
use App\Http\Requests\UpdateTecnicoRequest;

class TecnicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tecnicos=Tecnico::where('estado', true)->latest()->paginate(20);
        return view('tecnicos.index', ['tecnicos'=>$tecnicos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tecnicos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTecnicoRequest $request)
    {
        $fields = $request->only(['nombre', 'apellido','DNI','CUIL','telefono','correo']);
        $fields['estado'] = true;

        Tecnico::create($fields);

        return redirect()->route('tecnicos.index')->with('success', 'Tecnico agregado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tecnico $tecnico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tecnico $tecnico)
    {
        return view("tecnicos.edit",['tecnico'=>$tecnico]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTecnicoRequest $request, Tecnico $tecnico)
    {
        $fields = $request->only(['nombre', 'apellido','DNI','CUIL','telefono','correo']);

        $tecnico->update($fields);

        return redirect()->route('tecnicos.index')->with('success', 'Tecnico editado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tecnico $tecnico)
    {
        $tecnico->update(['estado' => false]);
        return back()->with('success', 'Tecnico exterminado exitosamente.');
    }
}
