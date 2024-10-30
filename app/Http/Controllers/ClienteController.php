<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes=Cliente::latest()->paginate(20);
        return view('clientes.index', ['clientes'=>$clientes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClienteRequest $request)
    {
        $fields = $request->only(['nombre', 'apellido','DNI','telefono','correo']);

        Cliente::create($fields);

        return redirect()->route('clientes.index')->with('success', 'Cliente agregado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        return view("clientes.edit",['cliente'=>$cliente]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClienteRequest $request, Cliente $cliente)
    {
        $fields = $request->only(['nombre', 'apellido','DNI','telefono','correo']);

        $cliente->update($fields);

        return redirect()->route('clientes.index')->with('success', 'Cliente editado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return back()->with('success', 'Cliente exterminado exitosamente.');
    }
}
