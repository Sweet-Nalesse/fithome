<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::with('user')->orderBy('created_at', 'desc')->paginate(10);
        return view('messages.index', compact('messages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required|string|max:255',
        ]);

        $message = Message::create([
            'body' => $request->body,
            'user_id' => Auth::id(),
        ]);

        return response()->json($message->load('user'));
    }

    public function fetchMessages(Request $request)
    {
        $messages = Message::with('user')->orderBy('created_at', 'desc')->paginate(10, ['*'], 'page', $request->page);
        return response()->json($messages);
    }

    public function edit(Message $message)
    {
        $this->authorize('update', $message);
        return view('messages.edit', ['message' => $message]);
    }

    public function update(Request $request, Message $message)
    {
        $this->authorize('update', $message);

        $validator = Validator::make($request->all(), [
            'body' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $message->update(['body' => $request->input('body')]);

        return redirect()->route('messages.index')->with('success', 'Message updated successfully.');
    }

    public function destroy(Message $message)
    {
        // Allow admin to delete any message
        if (Auth::user()->is_admin || Auth::id() === $message->user_id) {
            $message->delete();
            return redirect()->route('messages.index')->with('success', 'Message deleted successfully.');
        }

        abort(403, 'Unauthorized action.');
    }
}