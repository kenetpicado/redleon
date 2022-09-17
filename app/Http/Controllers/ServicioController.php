<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Services\Servicios;
use App\Http\Requests\ServicioRequest;
use App\Models\Cliente;
use App\Models\Registro;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    public function index()
    {
        $servicios = Servicio::index();
        return view('servicios.index', compact('servicios'));
    }

    /* Pagar */
    public function edit(Servicio $servicio)
    {
        $periodos = (new Servicios)->getPeriodo();
        return view('servicios.edit', compact('servicio', 'periodos'));
    }

    /* Ver detalles */
    public function show($servicio_id)
    {
        $servicio = Servicio::show($servicio_id);
        return view('servicios.show', compact('servicio'));
    }

    /* Crear servicio */
    public function store(ServicioRequest $request)
    {
        Servicio::updateOrCreate(
            ['cliente_id' => $request->cliente_id],
            $request->validated()
        );

        return redirect()->route('clientes.index')
            ->with('success', 'Servicio registrado');
    }

    /* Guardar pago */
    public function update(ServicioRequest $request, Servicio $servicio)
    {
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

        $servicio->update($request->all());

        Registro::create([
            'message' => $servicio->tipo . ' - ' . $servicio->operador,
            'monto' => $request->monto,
            'cliente_id' => $servicio->cliente_id,
            'created_at' => $servicio->fecha_pago,
        ]);

        return redirect()->route('servicios.recibo', $servicio->id);
    }

    public function recibo($servicio_id)
    {
        $servicio = Servicio::recibo($servicio_id);
        return view('servicios.recibo', compact('servicio'));
    }
}
