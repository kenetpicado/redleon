<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Services\Servicios;
use App\Http\Requests\ServicioRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    public function index()
    {
        $servicios = Servicio::index();
        return view('servicios.index', compact('servicios'));
    }

    public function edit(Servicio $servicio)
    {
        $tipos = (new Servicios)->getTipo();
        $periodos = (new Servicios)->getPeriodo();
        return view('servicios.edit', compact('servicio', 'tipos', 'periodos'));
    }

    public function show($servicio_id)
    {
        $servicio = Servicio::show($servicio_id);
        return view('servicios.show', compact('servicio'));
    }

    public function store(ServicioRequest $request)
    {
        $request = (new Servicios)->proximo_pago($request);
        Servicio::create($request->all());
        return redirect()->route('clientes.index')->with('success', 'Servicio guardado correctamente');
    }

    public function update(ServicioRequest $request, Servicio $servicio)
    {
        $request = (new Servicios)->proximo_pago($request);
        $servicio->update($request->all());
        return redirect()->route('servicios.index')->with('success', 'Servicio actualizado correctamente');
    }

    public function pay(Request $request, Servicio $servicio)
    {
        $request->validate([
            'fecha_pago' => 'required|date',
            'monto' => 'required|numeric',
            'periodo' => 'required',
        ]);

        $request = (new Servicios)->proximo_pago($request);
        $servicio->update($request->all());
        return redirect()->route('clientes.index')->with('success', 'Pago relizado correctamente');
    }
}
