<x-layout.default title="Show events list">
    @auth
        <div>
            <a href="{{ route('events.create') }}" class="btn btn-sm btn-success">Create event</a>
            <hr>
        </div>
    @endauth
    <div>
        <h2>List of events</h2>
        @foreach($events as $event)
            <div>
                <p><b>Title</b>: {{ $event->title }}</p>
                @auth
                    <a href="{{ route('events.show', [ $event->id ]) }}" class="btn btn-sm btn-info">Show more</a>
                @endauth
                <p><b>Category</b>: {{ $event->category->title }}</p>
                <p><b>User ID</b>: {{ $event->user->id }}</p>
                <p><b>User Name</b>: {{ $event->user->name }}</p>
            </div>
            <hr>
        @endforeach
    </div>
</x-layout.default>
