<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketStoreRequest;
use App\Models\Category;
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
        $statuses = Status::all();

        return view('userdashboard.create', compact('priorities', 'categories', 'locations', 'statuses'));
    }

    public function store(TicketStoreRequest $request)
    {
        Ticket::create($request->validated());
        return redirect()->route('dashboard');
    }
}
