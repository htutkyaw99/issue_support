<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ticket;
use App\Enums\TicketStatus;
use Illuminate\Http\Request;
use App\Enums\TicketPriority;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Enum;

class User3Controller extends Controller
{
    public function index()
    {
        $tickets = Ticket::where('user_id', Auth::id())->paginate(10);
        $priority = TicketPriority::values();

        return view(
            'issue.user.dashboard',
            [
                'priority' => $priority,
                'tickets' => $tickets
            ]
        );
    }

    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);

        $status = TicketStatus::values();
        $agents = User::whereIn('role', ['agent', 'admin'])->get();
        $priority = TicketPriority::values();

        return view(
            'issue.user.tickets',
            [
                'ticket' => $ticket,
                'status' => $status,
                'agents' => $agents,
                'priority' => $priority
            ]
        );
    }

    public function store(Request $request)
    {
        // dd('ticket created');
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

        return back();
    }

    public function close($id)
    {
        $ticket = Ticket::findOrFail($id);
        if (Auth::user()->id == $ticket->user->id) {
            $ticket->update(
                [
                    'status' => 'closed'
                ]
            );

            return back();
        } else {
            abort(403);
        }
    }
}
