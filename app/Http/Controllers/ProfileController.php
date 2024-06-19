<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\UserProfile;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        // Убедимся, что профиль существует
        if (!$user->profile) {
            UserProfile::create([
                'user_id' => $user->id,
                'age' => 0,
                'weight' => 0,
                'height' => 0,
                'fitness_goal' => '',
            ]);
            $user->refresh();
        }

        return view('profile.show', ['user' => $user]);
    }

    public function edit()
    {
        $user = Auth::user();
        
        // Убедимся, что профиль существует
        if (!$user->profile) {
            UserProfile::create([
                'user_id' => $user->id,
                'age' => 0,
                'weight' => 0,
                'height' => 0,
                'fitness_goal' => '',
            ]);
            $user->refresh();
        }

        return view('profile.edit', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'age' => 'required|integer|min:1',
            'weight' => 'required|numeric|min:1',
            'height' => 'required|numeric|min:1',
            'fitness_goal' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->profile->update([
            'age' => $request->input('age'),
            'weight' => $request->input('weight'),
            'height' => $request->input('height'),
            'fitness_goal' => $request->input('fitness_goal'),
        ]);

        $user->save();

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
    }
}
