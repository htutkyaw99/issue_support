<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Enums\TicketPriority;
use App\Enums\TicketStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Enum;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::latest()->paginate(10);

        return view('issue.tickets.tickets', compact('tickets'));
    }

    public function show($id)
    {
        $status = TicketStatus::values();
        $agents = User::whereIn('role', ['agent', 'admin'])->get();
        $ticket = Ticket::findOrFail($id);

        return view(
            'issue.tickets.ticket-detail',
            [
                'ticket' => $ticket,
                'status' => $status,
                'agents' => $agents
            ]
        );
    }

    public function create()
    {
        $priority = TicketPriority::values();

        return view('issue.tickets.create-ticket', compact('priority'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'priority' => ['required', new Enum(TicketPriority::class)],
        ]);

        Ticket::create([
            'title' => $request->title,
            'description' => $request->description,
            'priority' => $request->priority,
            'user_id' => Auth::id()
        ]);

        return redirect()->route('tickets.index')->with('status', 'Ticket created sucessfully!');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'agent_id' => 'required',
            'status' => 'required',
        ]);

        $ticket = Ticket::findOrFail($id);

        $data = [
            'agent_id' => (int)$request->agent_id,
            'status' => $request->status
        ];

        $ticket->update($data);

        return redirect()->back()->with('status', 'Ticket updated successfully!');
    }
}
