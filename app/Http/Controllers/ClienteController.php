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
    public function index()
    {
        $clientes = auth()->user()->rol == 'cobrador'
            ? Cliente::where('cobrador_id', auth()->user()->sub_id)->get()
            : Cliente::all();

        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        $cobradores = Cobrador::all();
        return view('clientes.create', compact('cobradores'));
    }

    public function store(ClienteRequest $request)
    {
        Cliente::create($request->all());
        return redirect()->route('clientes.index')->with('success', 'Cliente agregado correctamente');
    }

    public function edit(Cliente $cliente)
    {
        $cobradores = Cobrador::all();
        return view('clientes.edit', compact('cliente', 'cobradores'));
    }

    public function show(Cliente $cliente)
    {
        $cliente->load('servicio');
        $periodos = (new Servicios)->getPeriodo();

        if ($cliente->servicio)
            return view('servicios.pagar', compact('cliente', 'periodos'));

        $tipos = (new Servicios)->getTipo();
        return view('clientes.show', compact('cliente', 'tipos', 'periodos'));
    }

    public function update(ClienteRequest $request, Cliente $cliente)
    {
        $cliente->update($request->all());
        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado correctamente');
    }
}
