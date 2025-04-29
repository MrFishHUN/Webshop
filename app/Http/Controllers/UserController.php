<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $users = User::where('name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->paginate(10);
        } else {
            $users = User::paginate(10);
        }
        return view('admin.users.users.index', ['users' => $users]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $validated = $request->validated();
        $user->update([
            'name' => $validated['name'] ?? $user->name,
            'email' => $validated['email'] ?? $user->email,
            'password' => isset($validated['password']) ? bcrypt($validated['password']) : $user->password,
        ]);
        return redirect()->route('users.index')->with('success', 'Felhasználó email cím sikeresen frissítve');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Felhasználó sikeresen törölve');
    }

    public function editEmail(User $user)
    {
        return view('admin.users.users.edit', ['user' => $user]);
    }

    public function newPassword(User $user)
    {
        $user->sendPasswordReset();
        return redirect()->route('users.index')->with('success', 'Jelszó visszaállító email sikeresen elküldve');
    }

    public function forceDelete($user)
    {
        $user = User::onlyTrashed()->findOrFail($user);
        $user->forceDelete();
        return redirect()->route('users.trashed')->with('success', 'Felhasználó véglegesen törölve');
    }

    public function restore($user)
    {
        $user = User::onlyTrashed()->findOrFail($user);
        $user->restore();
        return redirect()->route('users.trashed')->with('success', 'Felhasználó sikeresen visszaállítva');
    }

    public function trashed(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $users = User::onlyTrashed()
                ->where('name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->paginate(10);
        } else {
            $users = User::onlyTrashed()->paginate(10);
        }
        return view('admin.users.deleted.index', ['users' => $users]);
    }
}
