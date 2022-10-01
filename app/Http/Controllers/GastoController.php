<?php

namespace App\Http\Controllers;

use App\Classes\ServiciosInfo;
use App\Http\Requests\GastoRequest;
use App\Models\Gasto;

class GastoController extends Controller
{
    public function index()
    {
        $gastos = Gasto::onMonth();
        $mes = ServiciosInfo::current_month();
        return view('gastos.index', compact('gastos', 'mes'));
    }

    public function store(GastoRequest $request)
    {
        Gasto::create($request->validated());
        return back()->with('success', 'Gasto agregado correctamente');
    }

    public function edit(Gasto $gasto)
    {
        return view('gastos.edit', compact('gasto'));
    }

    public function update(GastoRequest $request, Gasto $gasto)
    {
        $gasto->update($request->validated());
        return redirect()->route('gastos.index')->with('success', 'Gasto editado correctamente');
    }

    public function reporte()
    {
        $gastos = Gasto::onMonth();
        $mes = ServiciosInfo::current_month();
        return view('gastos.reporte', compact('gastos', 'mes'));
    }
}
