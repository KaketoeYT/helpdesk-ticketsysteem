<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class overviewController extends Controller
{
    public function index()
    {
        // Alleen voor admin
        $user = \Illuminate\Support\Facades\Auth::user();
        if (!$user || $user->role !== 'admin') {
            abort(403);
        }
        // Open tickets: geen assignment
        $openTickets = Ticket::where('closed_at', null)->count();

        // Gemiddelde afhandeltijd: verschil tussen created_at en closed_at
        $closedTickets = Ticket::whereNotNull('closed_at')->get();
        $avgHandleTime = null;
        if ($closedTickets->count() > 0) {
            $totalHours = $closedTickets->map(function($ticket) {
                return $ticket->created_at && $ticket->closed_at
                    ? $ticket->created_at->diffInHours($ticket->closed_at)
                    : null;
            })->filter()->sum();
            $avgHandleTime = round($totalHours / $closedTickets->count(), 2);
        }
        
        return view('overview', compact('openTickets', 'avgHandleTime'));
    }
}
