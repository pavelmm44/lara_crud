@extends('layouts.app')

@section('title', 'Create event')

@section('content')
    <a href="{{ route('events.index') }}"><b>Events list</b></a>
    <hr>
    <h2>Create event</h2>
    <div>
        <form action="{{ route('events.store') }}" method="post">
            @csrf
            <div>
                <label for="title">Title</label>
                <input type="text" name="title" placeholder="Title" id="title" value="{{ old('title') }}">
                @error('title')
                <p>{{ $message }}</p>
                @enderror
            </div>
            <br>

            <div>
                <label for="start_time">Start time</label>
                <input type="datetime-local" name="start_time" placeholder="Start time" id="start_time"
                       value="{{ old('start_time') }}">
                @error('start_time')
                <p>{{ $message }}</p>
                @enderror
            </div>
            <br>

            <div>
                <label for="duration">Duration(hours)</label>
                <input type="text" name="duration" placeholder="Duration" id="duration" value="{{ old('duration') }}">
                @error('duration')
                <p>{{ $message }}</p>
                @enderror
            </div>
            <br>

            <div>
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id">
                    <option selected disabled>Select category</option>
                    @foreach($categories as $k => $v)
                        <option value="{{ $k }}" {{ (old('category_id') == $k) ? 'selected' : '' }}>{{ $v }}</option>
                    @endforeach
                </select>

                @error('category_id')
                <p>{{ $message }}</p>
                @enderror
            </div>
            <br>

            <button>Save</button>
        </form>
    </div>
    <hr>
@endsection
