<?php

namespace App\Models;

use App\Casts\Upper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Servicio extends Model
{
    use HasFactory;

    protected $fillable = [
        'inicio',
        'tipo',
        'operador',
        'periodo',
        'fecha_pago',
        'proximo_pago',
        'monto',
        'equipo_instalado',
        'mac',
        'velocidad',
        'cliente_id',
    ];

    protected $casts = [
        'equipo_instalado' => Upper::class,
        'mac' => Upper::class,
        'operador' => Upper::class,
    ];

    public $timestamps = false;

    public static function index()
    {
        return DB::table('servicios')
            ->select([
                'servicios.*',
                'clientes.nombre as nombre',
            ])
            ->join('clientes', 'servicios.cliente_id', '=', 'clientes.id')
            ->orderBy('proximo_pago')
            ->get();
    }

    public static function show($servicio_id)
    {
        return DB::table('servicios')
            ->where('servicios.id', $servicio_id)
            ->select([
                'servicios.*',
                'clientes.nombre as nombre',
                'clientes.direccion as direccion',
                'clientes.telefono as telefono',
                'clientes.cedula as cedula',
            ])
            ->join('clientes', 'servicios.cliente_id', '=', 'clientes.id')
            ->first();
    }
}
