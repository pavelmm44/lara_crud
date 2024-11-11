<x-layout.default title="Show message">
    <div>
        <a href="{{ route('messages.index') }}" class="btn btn-sm btn-success">Messages list</a>
        <hr>
    </div>

    <div>
        <h2>Message info</h2>
        <p><b>ID</b>: {{ $message->id }}</p>
        <p><b>Title</b>: {{ $message->title }}</p>
        <p><b>Content</b>: {{ $message->content }}</p>
        <p><b>Creation date</b>: {{ $message->created_at }}</p>
        <p><b>Update date</b>: {{ $message->updated_at }}</p>
        <hr>
    </div>
</x-layout.default>
