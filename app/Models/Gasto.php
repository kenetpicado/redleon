<?php

namespace App\Models;

use App\Casts\Upper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    use HasFactory;
    protected $fillable = ['descripcion', 'monto', 'created_at'];
    public $timestamps = false;

    protected $casts = [
        'descripcion' => Upper::class,
    ];
}
