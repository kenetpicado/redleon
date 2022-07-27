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

    public function __construct()
    {
        $servicios = auth()->user()->rol == 'cobrador'
            ? DB::table('servicios')
            ->where('clientes.cobrador_id', auth()->user()->sub_id)
            ->select([
                'servicios.*',
            ])
            ->join('clientes', 'servicios.cliente_id', '=', 'clientes.id')
            ->get()
            : DB::table('servicios')->get();

        $registros = auth()->user()->rol == 'cobrador'
            ? DB::table('registros')
            ->where('clientes.cobrador_id', auth()->user()->sub_id)
            ->where('registros.created_at', '>=', date('Y-m-' . '01'))
            ->select([
                'registros.*',
            ])
            ->join('clientes', 'registros.cliente_id', '=', 'clientes.id')
            ->get()
            : DB::table('registros')->where('created_at', '>=', date('Y-m-' . '01'))->get();

        $this->total = $servicios->count();
        $this->cable = $servicios->where('tipo', 'CABLE')->count();
        $this->hfc = $servicios->where('tipo', 'INTERNET-HFC')->count();
        $this->fibra = $servicios->where('tipo', 'INTERNET-FIBRA')->count();
        $this->streaming = $servicios->where('tipo', 'STREAMING')->count();
        $this->ingreso = $registros->sum('monto');
        $this->mes = $this->current_month();
    }

    public static function current_month()
    {
        $meses = array("ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE");
        return $meses[date('n') - 1];
    }
}
