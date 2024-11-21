<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Models\Category;
use App\Models\Event;
use App\Models\Tag;
use Illuminate\Support\Facades\Gate;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with(['category', 'user', 'tags'])->get();

        return view('events.index', compact('events'));
    }

    public function create()
    {
        $categories = Category::all()->pluck('title', 'id');
        $tags = Tag::all()->pluck('title', 'id');

        return view('events.create', compact('categories', 'tags'));
    }

    public function store(EventRequest $request)
    {
        $validated = $request->validated();
        unset($validated['tags']);

        $event = new Event($validated);
        $event->user_id = $request->user()->id;
        $event->save();
        $event->tags()->attach($request->tags);

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
        $tags = Tag::all()->pluck('title', 'id');

        return view('events/edit', compact('event', 'categories', 'tags'));
    }

    public function update(EventRequest $request, Event $event)
    {
        Gate::authorize('update-event', $event);

        $validated = $request->validated();
        unset($validated['tags']);

        $event->update($validated);
        $event->tags()->sync($request->validated('tags'));

        return redirect()->route('events.edit', [$event->id])->with('success', 'Event has been updated');
    }

    public function destroy(Event $event)
    {
        Gate::authorize('update-event', $event);
        $event->tags()->sync([]);
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event has been deleted');
    }
}
