<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    //
    public function index($cliente_id)
    {
        $registros = Registro::where('cliente_id', $cliente_id)->latest('id')->get();
        return view('registros.index', compact('registros'));
    }
}
