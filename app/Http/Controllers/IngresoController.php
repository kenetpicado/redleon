<?php

namespace App\Http\Controllers;

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
}
