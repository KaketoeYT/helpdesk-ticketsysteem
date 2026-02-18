<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChatStoreRequest;
use App\Models\Chat;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chats = Chat::with(['user', 'ticket'])->get();

        return view('chats.index', compact('chats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $tickets = Ticket::all();
        return view('chats.create', compact('users', 'tickets'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ChatStoreRequest $request)
    {
        $chat = Chat::create($request->validated());
        return redirect()->route('chats.index')->with('success', 'Chat created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Chat $chat)
    {
        return view('chats.show', compact('chat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chat $chat)
    {
        $users = User::all();
        $tickets = Ticket::all();
        return view('chats.edit', compact('chat', 'users', 'tickets'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ChatStoreRequest $request, Chat $chat)
    {
        $chat->update($request->validated());
        return redirect()->route('chats.index')->with('success', 'Chat updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chat $chat)
    {
        $chat->delete();
        return redirect()->route('chats.index')->with('success', 'Chat deleted successfully.');
    }
}
