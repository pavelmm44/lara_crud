<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();

        return view('events.index', compact('events'));
    }

    public function create()
    {
        return view('events.create', ['categories' => config('categories')]);
    }

    public function store(EventRequest $request)
    {
        $validated = $request->validated();
        Event::create($validated);

        return redirect()->route('events.index')->with('success', 'Event has been created');
    }


    public function show(string $id)
    {
        $event = Event::findOrFail($id);
        $categories = config('categories');

        return view('events/show', compact('event', 'categories'));
    }

    public function edit(string $id)
    {
        $event = Event::findOrFail($id);
        $categories = config('categories');

        return view('events/edit', compact('event', 'categories'));
    }

    public function update(EventRequest $request, Event $event)
    {
        $validated = $request->validated();

        $event->update($validated);
        return redirect()->route('events.edit', [$event->id])->with('success', 'Event has been updated');
    }

    public function destroy(string $id)
    {
        Event::destroy($id);

        return redirect()->route('events.index')->with('success', 'Event has been deleted');
    }
}
