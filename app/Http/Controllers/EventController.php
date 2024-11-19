<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class EventController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware('auth', except: ['index'])
        ];
    }

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
        return view('events/show', compact('event'));
    }

    public function edit(Event $event)
    {
        $categories = Category::all()->pluck('title', 'id');

        return view('events/edit', compact('event', 'categories'));
    }

    public function update(EventRequest $request, Event $event)
    {
        $validated = $request->validated();

        $event->update($validated);
        return redirect()->route('events.edit', [$event->id])->with('success', 'Event has been updated');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event has been deleted');
    }
}
