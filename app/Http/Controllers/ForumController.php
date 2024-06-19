<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    public function index()
    {
        $forums = Forum::all();
        return view('forums.index', compact('forums'));
    }

    public function create()
    {
        return view('forums.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Forum::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('forums.index')->with('success', 'Форум успешно создан.');
    }

    public function show(Forum $forum)
    {
        return view('forums.show', compact('forum'));
    }

    public function edit(Forum $forum)
    {
        $this->authorize('update', $forum);
        return view('forums.edit', compact('forum'));
    }

    public function update(Request $request, Forum $forum)
    {
        $this->authorize('update', $forum);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $forum->update($request->only(['name', 'description']));

        return redirect()->route('forums.index')->with('success', 'Форум успешно обновлен.');
    }

    public function destroy(Forum $forum)
    {
        $this->authorize('delete', $forum);
        $forum->delete();

        return redirect()->route('forums.index')->with('success', 'Форум успешно удален.');
    }
}