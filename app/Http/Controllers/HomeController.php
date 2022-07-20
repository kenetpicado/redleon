<?php

namespace App\Http\Controllers;

use App\Classes\ServiciosInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $clientes = DB::table('clientes')->count();
        $servicios = (new ServiciosInfo());
        return view('home', compact('clientes', 'servicios'));
    }
}
