<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class overviewController extends Controller
{
    public function index()
    {
        // Alleen voor admin
        $user = Auth::user();
        if (!$user || $user->role !== 'admin') {
            abort(403);
        }
        
        // aantal van open tickets in progress tickets
        $openTickets = Ticket::where('closed_at', null)->whereNull('assigned_to')->get()->count();
        $inProgressTickets = Ticket::whereNull('closed_at')->whereNotNull('assigned_to')->get()->count();

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

        $closedTickets = $closedTickets->count();

        return view('overview', compact('openTickets', 'inProgressTickets', 'closedTickets', 'avgHandleTime'));
    }
}
