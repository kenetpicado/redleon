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

        $mes = ServiciosInfo::current_month();

        return view('ingresos.index', compact('ingresos', 'mes'));
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

    public function balance()
    {
        $meses = [
            ['01', 'Enero'],
            ['02', 'Febrero'],
            ['03', 'Marzo'],
            ['04', 'Abril'],
            ['05', 'Mayo'],
            ['06', 'Junio'],
            ['07', 'Julio'],
            ['08', 'Agosto'],
            ['09', 'Septiembre'],
            ['10', 'Octubre'],
            ['11', 'Noviembre'],
            ['12', 'Diciembre']
        ];

        $balances = [];

        foreach ($meses as $mes) {
            $inicio = date('Y-' . $mes[0] . '-01');
            $fin = date('Y-' . $mes[0] . '-31');

            $ingreso = DB::table('registros')
                ->whereBetween('created_at', [$inicio, $fin])
                ->sum('monto');

            $gasto = DB::table('gastos')
                ->whereBetween('created_at', [$inicio, $fin])
                ->sum('monto');

            array_push($balances, [$mes[1], $ingreso, $gasto, $ingreso - $gasto]);
        }
        $mes = ServiciosInfo::current_month();
        return view('ingresos.reporte', compact('balances', 'mes'));
    }
}
