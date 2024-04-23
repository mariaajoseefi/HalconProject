<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        // display a listing of roles
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        // show the form for creating a new role
        return view('roles.create');
    }

    public function store(Request $request)
    {
        // validate and store a newly created role
        $validatedData = $request->validate([
            'name' => 'required|unique:roles|max:255'
        ]);

        Role::create($validatedData);
        return redirect()->route('roles.index');
    }

    public function show(Role $role)
    {
        // display the specified role
        return view('roles.show', compact('role'));
    }

    public function edit(Role $role)
    {
        // show the form for editing the specified role
        return view('roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        // validate and update the specified role
        $validatedData = $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id . '|max:255'
        ]);

        $role->update($validatedData);
        return redirect()->route('roles.index');
    }

    public function destroy(Role $role)
    {
        // delete the specified role
        $role->delete();
        return redirect()->route('roles.index');
    }
}

