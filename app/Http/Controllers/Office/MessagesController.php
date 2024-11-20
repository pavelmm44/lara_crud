<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function index()
    {
        $messages = Message::all();

        return view('messages/index', compact('messages'));
    }

    public function create()
    {
        return view('messages/create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'min:10|max:30',
            'content' => 'min:10',
        ]);
        Message::create($validated);

        return redirect()->route('messages.index')->with('success', 'Message has been created.');
    }

    public function show(string $id)
    {
        $message = Message::findOrFail($id);

        return view('messages/show', compact('message'));
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

    public function sendValid(Request $request)
    {
        $validated = $request->validate([
            'title' => 'min:10|max:30',
            'content' => 'min:10'
        ]);
    }
}
