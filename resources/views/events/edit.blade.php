@extends('layouts.app')

@section('title', 'Edit event')

@section('content')
    <a href="{{ route('events.index') }}"><b>Events list</b></a> |
    <a href="{{ route('events.show', [ $event->id ]) }}"><b>Show event</b></a>

    <hr>
    @if(session('success'))
        <p>{{ session()->get('success') }}</p>
        <hr>
    @endif
    <h3>Edit event</h3>
    <div>
        <form action="{{ route('events.update', [ $event->id ]) }}" method="post">
            @csrf
            @method('PUT')
            <div>
                <label for="title">Title</label>
                <input type="text" name="title" placeholder="Title" id="title" value="{{ old('title', $event->title) }}">
                @error('title')
                    <p>{{ $message }}</p>
                @enderror
            </div><br>

            <div>
                <label for="start_time">Start time</label>
                <input type="datetime-local" name="start_time" placeholder="Start time" id="start_time" value="{{ old('start_time', $event->start_time) }}">
                @error('start_time')
                <p>{{ $message }}</p>
                @enderror
            </div><br>

            <div>
                <label for="duration">Duration(hours)</label>
                <input type="text" name="duration" placeholder="Duration" id="duration" value="{{ old('duration', $event->duration) }}">
                @error('duration')
                <p>{{ $message }}</p>
                @enderror
            </div><br>

            <div>
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id">
                    @foreach($categories as $k => $v)
                        <option value="{{ $k }}" {{ old('category_id') ? ((old('category_id') == $k) ? 'selected' : '') : (($event->category_id == $k) ? 'selected' : '') }}>{{ $v }}</option>
                    @endforeach
                </select>

                @error('category_id')
                <p>{{ $message }}</p>
                @enderror
            </div><br>


            <button>Save</button>
        </form>
    </div>
    <hr>
@endsection
