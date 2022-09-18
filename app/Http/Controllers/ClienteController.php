<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Http\Requests\ClienteUpdate;
use App\Models\Cliente;
use App\Models\Cobrador;
use App\Services\Servicios;

class ClienteController extends Controller
{

    public function index()
    {
        $clientes = Cliente::index();
        $cobradores = Cobrador::all(['id', 'nombre']);
        return view('clientes.index', compact('clientes', 'cobradores'));
    }

    public function store(ClienteRequest $request)
    {
        Cliente::create($request->all());
        return redirect()->route('clientes.index')->with('success', 'Cliente agregado correctamente');
    }

    public function edit(Cliente $cliente)
    {
        $cobradores = Cobrador::all(['id', 'nombre']);
        return view('clientes.edit', compact('cliente', 'cobradores'));
    }

    /* Ver Servicio de un Cliente */
    public function show(Cliente $cliente)
    {
        $cliente->load('servicio');
        $periodos = (new Servicios)->getPeriodo();
        $tipos = (new Servicios)->getTipo();

        return view('clientes.show', compact('cliente', 'tipos', 'periodos'));
    }

    public function update(ClienteUpdate $request, Cliente $cliente)
    {
        $cliente->update($request->all());
        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado correctamente');
    }
}
