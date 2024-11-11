@extends('layouts.app')

@section('title', 'Show event')

@section('content')
    <a href="{{ route('events.index') }}"><b>Events list</b></a>
    <hr>
    <h2>Event info</h2>
    <div>
        <p><b>ID</b>: {{ $event->id }}</p>
        <p><b>Title</b>: {{ $event->title }}</p>
        <p><b>Start time</b>: {{ $event->start_time }}</p>
        <p><b>Duration</b>: {{ $event->duration }} hours</p>
        <p><b>Category</b>: {{ $categories[$event->category_id] }}</p>
        <p><b>Creation date</b>: {{ $event->created_at }}</p>
        <p><b>Update date</b>: {{ $event->updated_at }}</p>
    </div>
    <hr>
    <form action="{{ route('events.destroy', [ $event->id ]) }}" method="post">
        @csrf
        @method('DELETE')
        <a href="{{ route('events.edit', [ $event->id ]) }}"><b>Edit event</b></a> |

        <button><b>Delete event</b></button>
    </form>
@endsection
