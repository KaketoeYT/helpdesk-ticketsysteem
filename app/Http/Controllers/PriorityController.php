<?php

namespace App\Http\Controllers;

use App\Models\Priority;
use Illuminate\Http\Request;

class PriorityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $priorities = Priority::all();
        return view('priorities.index', compact('priorities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('priorities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'number' => 'required|string|max:255|unique:priorities,number',
        ]);

        Priority::create([
            'number' => $validated['number'],
        ]);

        return redirect()->route('priorities.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Priority $priority)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Priority $priority)
    {
        return view('priorities.edit', compact('priority'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Priority $priority)
    {
        $validated = $request->validate([
            'number' => 'required|string|max:255|unique:priorities,number,' . $priority->id,
        ]);

        $priority->update([
            'number' => $validated['number'],
        ]);

        return redirect()->route('priorities.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Priority $priority)
    {
        $priority->delete();
        return redirect()->route('priorities.index');
    }
}
