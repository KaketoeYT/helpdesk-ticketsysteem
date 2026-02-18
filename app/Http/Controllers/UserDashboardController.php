<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketStoreRequest;
use App\Models\Category;
use App\Models\Chat;
use App\Models\Location;
use App\Models\Priority;
use App\Models\Status;
use App\Models\Ticket;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function create(){
        $priorities = Priority::all();
        $categories = Category::all();
        $locations = Location::all();

        return view('userdashboard.create', compact('priorities', 'categories', 'locations'));
    }

    public function store(TicketStoreRequest $request)
    {
        $defaultStatus = Status::where('is_default', true)->first();
        
        $data = $request->validated();

        // Alleen zetten als er geen status is meegestuurd
        if (!isset($data['status_id'])) {
            $data['status_id'] = $defaultStatus?->id;
        }

        Ticket::create($data);
        return redirect()->route('dashboard');
    }

    public function show($ticketId){
        $ticket = Ticket::findOrFail($ticketId);
        $chats = Chat::with(['user', 'ticket'])->where('ticket_id', $ticketId)->get();
        return view('userdashboard.show', compact('ticket', 'chats'));
    }

    public function storeChat(Request $request, $ticketId){
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        Chat::create([
            'ticket_id' => $ticketId,
            'user_id' => auth()->id(),
            'message' => $request->message,
        ]);

        return redirect()->route('userdashboard.show', $ticketId);
    }
}
