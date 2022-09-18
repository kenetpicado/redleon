<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Services\Servicios;
use App\Http\Requests\ServicioRequest;
use App\Http\Requests\ServicioUpdate;
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
        $cliente = Cliente::find($servicio->cliente_id, ['nombre']);
        $periodos = (new Servicios)->getPeriodo();
        return view('servicios.edit', compact('servicio', 'periodos', 'cliente'));
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
    public function update(ServicioUpdate $request, Servicio $servicio)
    {
        Registro::create([
            'message' => 'Se vencio el plan contratado el: ' . $servicio->periodo_fin,
            'monto' => $request->monto,
            'cliente_id' => $servicio->cliente_id,
            'created_at' => now(),
        ]);

        $servicio->update($request->validated());

        return redirect()->route('servicios.recibo', $servicio->id);
    }

    /* Ver recibo */
    public function recibo($servicio_id)
    {
        $servicio = Servicio::recibo($servicio_id);
        return view('servicios.recibo', compact('servicio'));
    }
}
