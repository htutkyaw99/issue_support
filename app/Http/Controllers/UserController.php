<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Enums\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Enum;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('role')->paginate(10);

        return view('issue.users', compact('users'));
    }

    public function show()
    {
        $roles = UserRole::cases();
        return view('issue.create-user', compact('roles'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'position' => 'required',
            'password' => 'required',
            'role' => ['required', new Enum(UserRole::class)],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'position' => $request->position,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        return redirect('/users')->with('status', 'User created successfully!');
    }

    public function edit($id)
    {
        // dd($id);
        $user = User::findOrFail($id);
        $roles = UserRole::cases();
        return view(
            'issue.edit-user',
            [
                'roles' => $roles,
                'user' => $user
            ]
        );
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'position' => 'required',
            'role' => ['required', new Enum(UserRole::class)],
            'password' => 'nullable|min:8',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'position' => $request->position,
            'role' => $request->role,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect('/users')->with('status', 'User updated successfully!');
    }
}
