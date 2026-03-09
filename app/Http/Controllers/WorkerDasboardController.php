<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\TicketAssignment;
use Illuminate\Http\Request;

class WorkerDasboardController extends Controller
{
    public function take($ticketId)
    {
        $ticket = Ticket::findOrFail($ticketId);

        // Check of het ticket al een worker heeft
        if ($ticket->assignedWorker) {
            return redirect()->back()->with('error', 'Dit ticket is al toegewezen aan een worker.');
        }

        // Maak een nieuwe toewijzing aan
        TicketAssignment::create([
            'ticket_id' => $ticketId,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('dashboard')->with('success', 'Ticket succesvol toegewezen aan jou.');
    }
}
