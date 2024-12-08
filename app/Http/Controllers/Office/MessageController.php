<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use App\Http\Requests\MessageRequest;
use App\Models\Message;
use App\Models\Tag;
use App\Services\AddressParsers\ParserInterface;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(ParserInterface $addParser)
    {
        $response = $addParser->clean("address", "мск сухонская 11 89");
        //dump($response);

        $messages = Message::with('tags')->get();

        return view('messages/index', compact('messages'));
    }

    public function create()
    {
        $tags = Tag::all()->pluck('title', 'id');

        return view('messages/create', compact('tags'));
    }

    public function store(MessageRequest $request)
    {
        $validated = $request->validated();
        unset($validated['tags']);

        $message = Message::create($validated);
        $message->tags()->attach($request->tags);

        return redirect()->route('messages.index')->with('success', 'Message has been created.');
    }

    public function show(Message $message)
    {
        return view('messages/show', compact('message'));
    }

    public function edit(Message $message)
    {
        $tags = Tag::all()->pluck('title', 'id');

        return view('messages.edit', compact('message', 'tags'));
    }

    public function update(MessageRequest $request, Message $message)
    {
        $validated = $request->validated();
        unset($validated['tags']);

        $message->update($validated);
        $message->tags()->sync($request->tags);

        return redirect()->route('messages.edit', [$message])->with('success', 'Message has been updated');
    }

    public function destroy(Message $message)
    {
        $message->tags()->sync([]);
        $message->delete();

        return redirect()->route('messages.index')->with('success', 'Message has been deleted');
    }

    public function sendValid(Request $request)
    {
        $validated = $request->validate([
            'title' => 'min:10|max:30',
            'content' => 'min:10'
        ]);
    }
}
