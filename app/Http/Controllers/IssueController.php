<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IssueController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(Auth::id());
        if ($user->role->value == 'admin') {
            $issues = Ticket::where('agent_id', '=', Auth::id())->paginate(10);

            return view('issue.dashboard', compact('issues'));
        } else if ($user->role->value == 'user') {
            $issues = Ticket::where('user_id', '=', Auth::id())->paginate(10);

            return view('issue.dashboard', compact('issues'));
        }
    }
}
