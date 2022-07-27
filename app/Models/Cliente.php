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
        'nota',
        'cedula',
    ];

    protected $casts = [
        'nombre' => Upper::class,
        'direccion' => Upper::class,
        'cedula' => Upper::class,
        'nota' => Upper::class,
    ];

    public $timestamps = false;

    public function servicio()
    {
        return $this->hasOne(Servicio::class);
    }
}
