<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Support\Facades\Gate;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with(['category', 'user'])->get();

        return view('events.index', compact('events'));
    }

    public function create()
    {
        $categories = Category::all()->pluck('title', 'id');

        return view('events.create', compact('categories'));
    }

    public function store(EventRequest $request)
    {
        $event = new Event($request->validated());
        $event->user_id = $request->user()->id;
        $event->save();

        return redirect()->route('events.index')->with('success', 'Event has been created');
    }


    public function show(Event $event)
    {
        Gate::authorize('update-event', $event);
        return view('events/show', compact('event'));
    }

    public function edit(Event $event)
    {
        Gate::authorize('update-event', $event);
        $categories = Category::all()->pluck('title', 'id');

        return view('events/edit', compact('event', 'categories'));
    }

    public function update(EventRequest $request, Event $event)
    {
        Gate::authorize('update-event', $event);
        $validated = $request->validated();

        $event->update($validated);
        return redirect()->route('events.edit', [$event->id])->with('success', 'Event has been updated');
    }

    public function destroy(Event $event)
    {
        Gate::authorize('update-event', $event);
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event has been deleted');
    }
}
