<?php

namespace App\Http\Controllers;

use App\Classes\ServiciosInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IngresoController extends Controller
{
    public function index()
    {
        $ingresos = DB::table('registros')
            ->where('registros.created_at', '>=', date('Y-m-' . '01'))
            ->select([
                'registros.*',
                'clientes.nombre as nombre'
            ])
            ->join('clientes', 'registros.cliente_id', '=', 'clientes.id')
            ->latest('id')
            ->get();

        return view('ingresos.index', compact('ingresos'));
    }

    public function facturas()
    {
        $registros = DB::table('registros')
        ->where('created_at', '>=', date('Y-m-' . '01'))
        ->join('clientes', 'registros.cliente_id', '=', 'clientes.id')
        ->get([
            'registros.id',
            'registros.monto',
            'registros.created_at',
            'clientes.nombre',
        ]);

        $mes = ServiciosInfo::current_month();
        return view('ingresos.facturas', compact('registros', 'mes'));
    }
}
