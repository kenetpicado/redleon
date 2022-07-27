<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'message',
        'monto',
        'cliente_id',
        'created_at',
    ];
}
