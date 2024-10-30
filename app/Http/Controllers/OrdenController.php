<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use App\Http\Requests\StoreOrdenRequest;
use App\Http\Requests\UpdateOrdenRequest;
use App\Models\Cliente;
use App\Models\Equipo;
use App\Models\Tipos;

class OrdenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ordenes=Orden::all();
        return view('ordenes.index',['ordenes'=>$ordenes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::all();
        $equipos = Equipo::all();
        $tipos = Tipos::all();
        return view('ordenes.create',compact('clientes','equipos','tipos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrdenRequest $request)
    {
        $fields = $request->only(['cliente_id', 'equipo_id','tipo_id','descripcion']);
        $fields['estado_id'] = 1;
        Orden::create($fields);

        return redirect()->route('ordenes.index')->with('success', 'Orden creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Orden $orden)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orden $orden)
    {
        
        $clientes = Cliente::all();
        $equipos = Equipo::all();
        $tipos = Tipos::all();
        return view("ordenes.edit", compact('orden', 'clientes', 'equipos', 'tipos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrdenRequest $request, Orden $orden)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Orden $orden)
    {
        dd($orden);
    }
}
