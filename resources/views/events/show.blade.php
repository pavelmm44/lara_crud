<x-layout.default title="Show event">
    <div>
        <a href="{{ route('events.index') }}" class="btn btn-sm btn-success">Events list</a>
        <hr>
    </div>
    <div>
        <h2>Event info</h2>
        <p><b>ID</b>: {{ $event->id }}</p>
        <p><b>Title</b>: {{ $event->title }}</p>
        <p><b>Start time</b>: {{ $event->start_time }}</p>
        <p><b>Duration</b>: {{ $event->duration }} hours</p>
        <p><b>Category</b>: {{ $categories[$event->category_id] }}</p>
        <p><b>Creation date</b>: {{ $event->created_at }}</p>
        <p><b>Update date</b>: {{ $event->updated_at }}</p>
        <hr>

        <form action="{{ route('events.destroy', [ $event->id ]) }}" method="post">
            @csrf
            @method('DELETE')
            <a href="{{ route('events.edit', [ $event->id ]) }}" class="btn btn-warning btn-sm">Edit event</a> |

            <button class="btn btn-danger btn-sm">Delete event</button>
        </form>
    </div>
</x-layout.default>
