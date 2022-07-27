<?php

namespace App\Http\Controllers;

use App\Http\Requests\CobradorRequest;
use App\Models\Cliente;
use App\Models\Cobrador;
use App\Models\User;
use Illuminate\Http\Request;

class CobradorController extends Controller
{
    public function index()
    {
        $cobradores = Cobrador::all();
        return view('cobradores.index', compact('cobradores'));
    }

    public function clientes($cobrador_id)
    {
        $clientes = Cliente::where('cobrador_id', $cobrador_id)->get();
        return view('cobradores.clientes', compact('clientes'));
    }

    public function create()
    {
        return view('cobradores.create');
    }

    public function edit(Cobrador $cobrador)
    {
        return view('cobradores.edit', compact('cobrador'));
    }

    public function update(CobradorRequest $request, Cobrador $cobrador)
    {
        $cobrador->update($request->all());

        User::where('email', $cobrador->usuario)->update([
            'name' => $cobrador->nombre,
            'email' => $cobrador->usuario,
        ]);

        return redirect()->route('cobradors.index')->with('success', 'Cobrador actualizado correctamente');
    }


    public function store(CobradorRequest $request)
    {
        $cobrador = Cobrador::create($request->all());

        User::create([
            'name' => $request->nombre,
            'email' => $request->usuario,
            'sub_id' => $cobrador->id,
            'rol' => 'cobrador',
            'password' => bcrypt('FFFFFF'),
        ]);

        return redirect()->route('cobradors.index')->with('success', 'Cobrador agregado correctamente');
    }

    public function destroy(Cobrador $cobrador)
    {
        User::where('email', $cobrador->usuario)->delete();
        $cobrador->delete();
        return redirect()->route('cobradors.index')->with('success', 'Cobrador eliminado correctamente');
    }
}
