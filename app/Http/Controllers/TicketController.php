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
    public function index(Request $request)
    {
        $user = auth()->user();
        $showUnassigned = $request->get('unassigned', false);
        $categoryId = $request->get('category_id');
        $statusId = $request->get('status_id');
        $priorityId = $request->get('priority_id');
        $locationId = $request->get('location_id');
        $query = Ticket::with(['category', 'priority', 'location', 'user']);

        // Worker: altijd alleen unassigned tickets, geen toggle
        if ($user && $user->role === 'worker') {
            $query->whereDoesntHave('assignments');
            $showUnassigned = true;
        } else {
            if ($showUnassigned) {
                $query->whereDoesntHave('assignments');
            }
        }

        // filters
        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }
        if ($statusId) {
            $query->where('status_id', $statusId);
        }
        if ($priorityId) {
            $query->where('priority_id', $priorityId);
        }
        if ($locationId) {
            $query->where('location_id', $locationId);
        }

        $tickets = $query->get();
        $categories = Category::all();
        $statuses = Status::all();
        $priorities = Priority::all();
        $locations = Location::all();
        $hideUnassignedToggle = $user && $user->role === 'worker';
        return view('tickets.index_test', compact('tickets', 'showUnassigned', 'categories', 'categoryId', 'statuses', 'statusId', 'priorities', 'priorityId', 'locations', 'locationId', 'hideUnassignedToggle'));
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
        return view('tickets.edit_test', [
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
