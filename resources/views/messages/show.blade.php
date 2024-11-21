<x-layout.office title="Show message">
    <div>
        <h2>Message info</h2>
        <p><b>ID</b>: {{ $message->id }}</p>
        <p><b>Title</b>: {{ $message->title }}</p>
        <p><b>Content</b>: {{ $message->content }}</p>
        <p><b>Creation date</b>: {{ $message->created_at }}</p>
        <p><b>Update date</b>: {{ $message->updated_at }}</p>

        @if($message->tags->isNotEmpty())
            <p><b>Tags:</b></p>
            <p>
                @foreach($message->tags as $tag)
                    {{ $tag->title }}
                @endforeach
            </p>
        @endif

        <hr>

        <form action="{{ route('messages.destroy', [ $message->id ]) }}" method="post">
            @csrf
            @method('DELETE')
            <a href="{{ route('messages.edit', [ $message->id ]) }}" class="btn btn-warning btn-sm">Edit message</a> |

            <button class="btn btn-danger btn-sm">Delete message</button>
        </form>

    </div>
</x-layout.office>
