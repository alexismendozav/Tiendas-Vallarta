<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index',[
            'users' => $users
        ]);
    }

    public function store(UserRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        return redirect()
        ->route('users')
        ->with('info','Usuario creado correctamente');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', [
            'user' => $user
        ]);
    }

    public function update(UserRequest $request, Int $id)
    {
        $user = User::find($id);
        $user->name     = $request->name;
        $user->email     = $request->email;
        $user->save();
        return redirect()
            ->route('users')
            ->with('info', 'Usuario actualizado correctamente');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()
            ->route('users')
            ->with('info', 'Usuario eliminado correctamente');
    }
}
