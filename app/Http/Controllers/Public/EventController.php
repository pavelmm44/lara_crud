<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index ()
    {
        $events = Event::with(['category', 'user'])->get();

        return view('public.events.index', compact('events'));
    }
}
