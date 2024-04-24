<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));  // Make sure 'users.index' is the correct view
    }

    public function create()
    {
        // show the form for creating a new user
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|unique:users|max:255',
            'password' => 'required|min:6',
            'role_id' => 'required|exists:roles,id'
        ]);
        
        $validatedData['password'] = Hash::make($validatedData['password']);
        $user = User::create($validatedData);
        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        // display the specified user
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $roles = Role::all(); // obtiene todos los roles para listar en el formulario
        return view('users.edit', compact('user', 'roles')); // pasa tanto el usuario como los roles a la vista
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'username' => 'required|max:255|unique:users,username,' . $user->id,
            'password' => 'sometimes|min:6',
            'role_id' => 'required|exists:roles,id'
        ]);
        
        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($request->password);
        }
        
        $user->update($validatedData);
        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        // deactivate the specified user
        $user->active = false;
        $user->save();
        return redirect()->route('users.index');
    }

    public function showUnregisteredForm()
    {
        return view('unregistered');
    }
}

