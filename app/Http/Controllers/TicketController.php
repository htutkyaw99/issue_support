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

        return view('issue.tickets', compact('tickets'));
    }

    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);

        return view(
            'issue.ticket-detail',
            [
                'ticket' => $ticket,
            ]
        );
    }

    public function create()
    {
        $priority = TicketPriority::cases();

        return view('issue.create-ticket', compact('priority'));
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

        return redirect('/tickets')->with('status', 'Ticket created sucessfully!');
    }

    public function assign($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->agent_id = Auth::id();
        $ticket->status = TicketStatus::IN_PROGRESS->value;
        $ticket->save();
        return back();
    }

    public function resolve($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->status = TicketStatus::RESOLVED->value;
        $ticket->save();
        return back();
    }
}
