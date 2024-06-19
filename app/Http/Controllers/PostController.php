<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(Forum $forum)
    {
        return view('posts.create', compact('forum'));
    }

    public function store(Request $request, Forum $forum)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image_url' => 'nullable|url',
        ]);

        $forum->posts()->create([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $request->image_url,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('forums.show', $forum)->with('success', 'Пост успешно создан.');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $forum = $post->forum;
        return view('posts.edit', compact('post', 'forum'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image_url' => 'nullable|url',
        ]);

        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $request->image_url,
        ]);

        return redirect()->route('posts.show', $post)->with('success', 'Пост успешно обновлен.');
    }

    public function destroy(Post $post)
    {
        $forum = $post->forum;
        $post->delete();

        return redirect()->route('forums.show', $forum)->with('success', 'Пост успешно удален.');
    }
}
