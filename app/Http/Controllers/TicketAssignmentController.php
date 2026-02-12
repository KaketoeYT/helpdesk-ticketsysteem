<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketAssignmentStoreRequest;
use App\Models\Ticket;
use App\Models\TicketAssignment;
use App\Models\User;
use Illuminate\Http\Request;

class TicketAssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ticketAssignments = TicketAssignment::with(['ticket', 'user'])->get();
        return view('ticket_assignments.index', compact('ticketAssignments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('role', 'admin')->orWhere('role', 'worker')->get();
        $tickets = Ticket::all();
        return view('ticket_assignments.create', compact('users', 'tickets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TicketAssignmentStoreRequest $request)
    {
        TicketAssignment::create($request->validated());
        return redirect()->route('ticket_assignments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(TicketAssignment $ticketAssignment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TicketAssignment $ticketAssignment)
    {
        $users = User::where('role', 'admin')->orWhere('role', 'worker')->get();    
        return view('ticket_assignments.edit', compact('ticketAssignment', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TicketAssignmentStoreRequest $request, TicketAssignment $ticketAssignment)
    {
        $ticketAssignment->update($request->validated());
        return redirect()->route('ticket_assignments.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TicketAssignment $ticketAssignment)
    {
        $ticketAssignment->delete();
        return redirect()->route('ticket_assignments.index');
    }
}
