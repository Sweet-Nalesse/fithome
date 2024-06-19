<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserProfile;

class UserProfileController extends Controller
{
    public function create()
    {
        return view('profiles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'age' => 'required|integer|min:1',
            'weight' => 'required|numeric|min:1',
            'height' => 'required|numeric|min:1',
            'fitness_goal' => 'required|string|max:255',
        ]);

        $profile = UserProfile::create([
            'user_id' => Auth::id(),
            'age' => $request->age,
            'weight' => $request->weight,
            'height' => $request->height,
            'fitness_goal' => $request->fitness_goal,
        ]);

        return redirect()->route('profiles.show', $profile->id)->with('success', 'Профиль создан.');
    }

    public function show(UserProfile $profile)
    {
        $this->authorize('view', $profile);
        return view('profiles.show', compact('profile'));
    }

    public function edit(UserProfile $profile)
    {
        $this->authorize('update', $profile);
        return view('profiles.edit', compact('profile'));
    }

    public function update(Request $request, UserProfile $profile)
    {
        $this->authorize('update', $profile);

        $request->validate([
            'age' => 'required|integer|min:1',
            'weight' => 'required|numeric|min:1',
            'height' => 'required|numeric|min:1',
            'fitness_goal' => 'required|string|max:255',
        ]);

        $profile->update($request->all());

        return redirect()->route('profiles.show', $profile->id)->with('success', 'Профиль обновлен.');
    }
}
