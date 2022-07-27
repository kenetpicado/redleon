<?php

namespace App\Http\Controllers;

use App\Classes\ServiciosInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $clientes = auth()->user()->rol == 'cobrador'
            ?  DB::table('clientes')->where('cobrador_id', auth()->user()->sub_id)->count()
            :  DB::table('clientes')->count();

        $servicios = (new ServiciosInfo());
        return view('home', compact('clientes', 'servicios'));
    }
}
