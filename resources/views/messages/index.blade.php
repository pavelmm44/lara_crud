<x-layout.default title="Show messages list">
    <div>
        <a href="{{ route('messages.create') }}" class="btn btn-sm btn-success">Create message</a>
        <hr>
    </div>
    <div>
        <h2>List of messages</h2>
        @foreach($messages as $message)
            <div>
                <p><b>Title</b>: {{ $message->title }}</p>
                <a href="{{ route('messages.show', [ $message->id ]) }}" class="btn btn-sm btn-info">Show more</a>
            </div>
            <hr>
        @endforeach
    </div>
</x-layout.default>
