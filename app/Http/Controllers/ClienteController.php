<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use App\Models\Cobrador;
use App\Services\Servicios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    /**
     * Ver todos los Clientes
     *
     * @return view
     */
    public function index()
    {
        $clientes = Cliente::orderBy('nombre')
            ->when(auth()->user()->rol == 'cobrador', function ($q) {
                $q->where('cobrador_id', auth()->user()->sub_id);
            })->get();

        $cobradores = auth()->user()->rol == 'admin'
            ? Cobrador::all(['id', 'nombre'])
            : null;

        return view('clientes.index', compact('clientes', 'cobradores'));
    }

    /**
     * Ver detalles de un cliente
     *
     * @param  int $cliente_id
     * @return view
     */
    public function detalles($cliente_id)
    {
        $cliente = Cliente::find($cliente_id);
        return view('clientes.detalles', compact('cliente'));
    }


    /**
     * Guardar cliente
     *
     * @param  ClienteRequest $request
     * @return RedirectResponse
     */
    public function store(ClienteRequest $request)
    {
        Cliente::create($request->all());
        return redirect()->route('clientes.index')->with('success', 'Cliente agregado correctamente');
    }

    /**
     * Editar informacion persona
     * de un cliente
     *
     * @param  Cliente $cliente
     * @return view
     */
    public function edit(Cliente $cliente)
    {
        $cobradores = Cobrador::all();
        return view('clientes.edit', compact('cliente', 'cobradores'));
    }

    /**
     * Contratar un nuevo servicio
     *
     * @param  Cliente $cliente
     * @return view
     */
    public function show(Cliente $cliente)
    {
        $cliente->load('servicio');

        if (auth()->user()->rol == 'cobrador' && !$cliente->servicio)
            return redirect()->route('clientes.index')->with('success', 'Error, no se ha creado el servicio');

        $periodos = (new Servicios)->getPeriodo();
        if ($cliente->servicio)
            return view('servicios.pagar', compact('cliente', 'periodos'));

        $tipos = (new Servicios)->getTipo();
        return view('clientes.show', compact('cliente', 'tipos', 'periodos'));
    }

    /**
     * Actualizar informacion personal
     * de un cliente
     *
     * @param  ClienteRequest $request
     * @param  Cliente $cliente
     * @return RedirectResponse
     */
    public function update(ClienteRequest $request, Cliente $cliente)
    {
        $cliente->update($request->all());
        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado correctamente');
    }
}
