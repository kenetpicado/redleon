<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->only(['name', 'email']));
        return redirect()->route('home')->with('success', 'Usuario actualizado correctamente');
    }

    public function password(Request $request, User $user)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed'
        ]);

        $user->update([
            'password' => bcrypt($request->password),
        ]);
        
        return redirect()->route('home')->with('success', 'Usuario actualizado correctamente');
    }
}
