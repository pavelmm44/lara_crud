<x-layout.default title="Show events list">
    <div>
        <a href="{{ route('events.create') }}" class="btn btn-sm btn-success">Create event</a>
        <hr>
    </div>
    <div>
        <h2>List of events</h2>
        @foreach($events as $event)
            <div>
                <p><b>Title</b>: {{ $event->title }}</p>
                <a href="{{ route('events.show', [ $event->id ]) }}" class="btn btn-sm btn-info">Show more</a>
                <p><b>Category</b>: {{ $event->category->title }}</p>
            </div>
            <hr>
        @endforeach
    </div>
</x-layout.default>
