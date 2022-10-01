<?php

namespace App\Models;

use App\Casts\Upper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Gasto extends Model
{
    use HasFactory;
    protected $fillable = ['descripcion', 'monto', 'created_at'];
    public $timestamps = false;

    protected $casts = [
        'descripcion' => Upper::class,
    ];

    public static function onMonth()
    {
        return DB::table('gastos')
            ->where('created_at', '>=', date('Y-m-' . '01'))
            ->latest('id')
            ->get();
    }
}
