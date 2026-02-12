<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketStoreRequest;
use App\Models\Category;
use App\Models\Location;
use App\Models\Priority;
use App\Models\Status;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::with(['category', 'priority', 'location'])->get();

        return view('tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $priorities = Priority::all();
        $categories = Category::all();
        $locations = Location::all();
        $statuses = Status::all();

        return view('tickets.create', compact('priorities', 'categories', 'locations', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TicketStoreRequest $request)
    {
        
        $defaultStatus = Status::where('is_default', true)->first();
        
        $data = $request->validated();

        // Alleen zetten als er geen status is meegestuurd
        if (!isset($data['status_id'])) {
            $data['status_id'] = $defaultStatus?->id;
        }

        Ticket::create($data);
        return redirect()->route('tickets.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        return view('tickets.edit', [
            'ticket' => $ticket,
            'categories' => Category::all(),
            'priorities' => Priority::all(),
            'locations' => Location::all(),
            'statuses' => Status::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TicketStoreRequest $request, Ticket $ticket)
    {
        $ticket->update($request->validated());
        return redirect()->route('tickets.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();
        return redirect()->route('tickets.index');
    }
}
