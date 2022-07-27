<?php

namespace App\Models;

use App\Casts\Upper;
use App\Casts\Lower;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cobrador extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'usuario',
    ];

    protected $casts = [
        'nombre' => Upper::class,
        'usuario' => Lower::class,
    ];

}
