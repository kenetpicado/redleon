<?php

namespace App\Classes;

use Illuminate\Support\Facades\DB;

class ServiciosInfo
{
    public $total;
    public $cable;
    public $hfc;
    public $fibra;
    public $ingreso;
    public $gasto;

    public function __construct()
    {
        $servicios = DB::table('servicios')
            ->when(auth()->user()->rol == 'cobrador', function ($q) {
                $q->where('clientes.cobrador_id', auth()->user()->sub_id)
                    ->join('clientes', 'servicios.cliente_id', '=', 'clientes.id');
            })
            ->get(['tipo']);

        $registros = DB::table('registros')
            ->when(auth()->user()->rol == 'cobrador', function ($q) {
                $q->where('created_at', date('Y-m-d'))
                    ->join('clientes', 'registros.cliente_id', '=', 'clientes.id')
                    ->where('clientes.cobrador_id', auth()->user()->sub_id);
            }, function ($q) {
                $q->where('created_at', '>=', date('Y-m-' . '01'));
            })
            ->get(['monto']);

        $gastos = DB::table('gastos')
            ->where('created_at', '>=', date('Y-m-' . '01'))
            ->latest('id')
            ->get('monto');

        $this->total = $servicios->count();
        $this->cable = $servicios->where('tipo', 'CABLE')->count();
        $this->hfc = $servicios->where('tipo', 'INTERNET-HFC')->count();
        $this->fibra = $servicios->where('tipo', 'INTERNET-FIBRA')->count();
        $this->streaming = $servicios->where('tipo', 'STREAMING')->count();
        $this->ingreso = $registros->sum('monto');
        $this->gasto = $gastos->sum('monto');
        $this->mes = $this->current_month();
    }

    public static function current_month()
    {
        $meses = array("ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE");
        return $meses[date('n') - 1];
    }
}
