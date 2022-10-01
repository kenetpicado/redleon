<?php

namespace App\Http\Controllers;

use App\Classes\ServiciosInfo;
use App\Http\Requests\GastoRequest;
use App\Models\Gasto;
use Illuminate\Support\Facades\DB;

class GastoController extends Controller
{
    public function index()
    {
        $gastos = DB::table('gastos')
            ->where('created_at', '>=', date('Y-m-' . '01'))
            ->latest('id')
            ->get();

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
}
