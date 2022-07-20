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
        $servicios = DB::table('servicios')->get();
        $this->total = $servicios->count();
        $this->cable = $servicios->where('tipo', 'CABLE')->count();
        $this->hfc = $servicios->where('tipo', 'INTERNET-HFC')->count();
        $this->fibra = $servicios->where('tipo', 'INTERNET-FIBRA')->count();
        $this->ingreso = $servicios->where('fecha_pago', '>=', date('Y-m-' . '01'))->sum('monto');
        $this->mes = $this->current_month();
    }

    public static function current_month()
    {
        $meses = array("ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE");
        return $meses[date('n') - 1];
    }
}
