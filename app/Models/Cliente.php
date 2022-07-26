<?php

namespace App\Models;

use App\Casts\Upper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',
        'cedula',
        'cobrador_id'
    ];

    protected $casts = [
        'nombre' => Upper::class,
        'direccion' => Upper::class,
        'cedula' => Upper::class,
    ];

    public $timestamps = false;

    public function servicio()
    {
        return $this->hasOne(Servicio::class);
    }

    public static function index()
    {
        return Cliente::orderBy('nombre')
            ->get(['id', 'nombre', 'direccion', 'telefono']);
    }
}
