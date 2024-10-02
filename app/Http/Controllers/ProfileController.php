<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function show()
    {
        // Display the user's profile
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }

    public function edit()
    {
        // Show the form to edit the profile
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        // Validate and update the user's profile
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
        ]);

        $user = Auth::user();
        $user->update($request->only('name', 'email'));

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
    }

    public function destroy()
    {
        // Delete the user account
        $user = Auth::user();
        $user->delete();

        return redirect('/')->with('success', 'Account deleted successfully.');
    }
}
