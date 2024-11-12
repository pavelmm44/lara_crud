<x-layout.default title="Show category">
    <div>
        <a href="{{ route('categories.index') }}" class="btn btn-sm btn-success">Categories list</a>
        <hr>
    </div>
    <div>
        <h2>Category info</h2>
        <p><b>ID</b>: {{ $category->id }}</p>
        <p><b>Title</b>: {{ $category->title }}</p>
        <p><b>Url</b>: {{ $category->url }}</p>
        <p><b>Creation date</b>: {{ $category->created_at }}</p>
        <p><b>Update date</b>: {{ $category->updated_at }}</p>
        <hr>

        <form action="{{ route('categories.destroy', [ $category->id ]) }}" method="post">
            @csrf
            @method('DELETE')
            <a href="{{ route('categories.edit', [ $category->id ]) }}" class="btn btn-warning btn-sm">Edit category</a> |

            <button class="btn btn-danger btn-sm">Delete category</button>
        </form>
    </div>

    @if($category->events->isNotEmpty())
        <div>
            <h2>List of events</h2>
            @foreach($category->events as $event)
                <div>
                    <p><b>Title</b>: {{ $event->title }}</p>
                    <a href="{{ route('events.show', [ $event->id ]) }}" class="btn btn-sm btn-info">Show more</a>
                </div>
                <hr>
            @endforeach
        </div>
    @endif
</x-layout.default>
