<?php

namespace App\Services;

use App\Classes\Items;
use Carbon\Carbon;

class Servicios
{
    public function getTipo()
    {
        $tipos = [];
        array_push($tipos, new Items('STREAMING'));
        array_push($tipos, new Items('CABLE'));
        array_push($tipos, new Items('INTERNET-HFC'));
        array_push($tipos, new Items('INTERNET-FIBRA'));
        return $tipos;
    }

    public function getPeriodo()
    {
        $periodos = [];
        array_push($periodos, new Items('1-MES'));
        array_push($periodos, new Items('3-MESES'));
        array_push($periodos, new Items('6-MESES'));
        array_push($periodos, new Items('12-MESES'));
        return $periodos;
    }

    public function proximo_pago($request)
    {
        return $request->merge([
            'proximo_pago' => $this->get_end($request->periodo, $request->fecha_pago),
        ]);
    }

    public function get_end($value, $fecha)
    {
        $date =  Carbon::create($fecha);

        switch ($value) {
            case '1-MES':
                $new = $date->addMonth(1)->format('Y-m-d');
                break;
            case '3-MESES':
                $new = $date->addMonth(3)->format('Y-m-d');
                break;
            case '6-MESES':
                $new = $date->addMonth(6)->format('Y-m-d');
                break;
            case '12-MESES':
                $new = $date->addYear(1)->format('Y-m-d');
                break;
        }
        return $new;
    }
}
