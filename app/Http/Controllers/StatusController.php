<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;

class StatusController extends Controller
{
    public function index()
    {
        // list all statuses
        $statuses = Status::all();
        return view('statuses.index', compact('statuses'));
    }

    public function create()
    {
        // form to create a new status
        return view('statuses.create');
    }

    public function store(Request $request)
    {
        // store a new status
        $validatedData = $request->validate([
            'name' => 'required|unique:statuses|max:255'
        ]);

        Status::create($validatedData);
        return redirect()->route('statuses.index');
    }

    public function edit(Status $status)
    {
        // form to edit a status
        return view('statuses.edit', compact('status'));
    }

    public function update(Request $request, Status $status)
    {
        // update a status
        $validatedData = $request->validate([
            'name' => 'required|unique:statuses,name,' . $status->id . '|max:255'
        ]);

        $status->update($validatedData);
        return redirect()->route('statuses.index');
    }

    public function destroy(Status $status)
    {
        // delete a status
        $status->delete();
        return redirect()->route('statuses.index');
    }
}

