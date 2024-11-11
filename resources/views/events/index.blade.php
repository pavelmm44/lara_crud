@extends('layouts.app')

@section('title', 'Show events list')

@section('content')
    <a href="{{ route('events.create') }}"><b>Create event</b></a>
    <hr>
    @if(session('success'))
        <p>{{ session()->get('success') }}</p>
        <hr>
    @endif
    <h2>List of events</h2>
    @foreach($events as $event)
        <div>
            <p><b>Title</b>: {{ $event->title }}</p>
            <a href="{{ route('events.show', [ $event->id ]) }}"><b>Show more</b></a>
        </div>
        <hr>
    @endforeach
@endsection
