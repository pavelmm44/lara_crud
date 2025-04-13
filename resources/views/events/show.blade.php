@php use Illuminate\Support\Facades\Storage; @endphp
<x-layout.office title="Show event">

    <div>
        <h2>Event info</h2>
        <p><b>ID</b>: {{ $event->id }}</p>
        <p><b>Title</b>: {{ $event->title }}</p>
        <p><b>Url</b>: {{ $event->url }}</p>
        <p><b>Start time</b>: {{ $event->start_time }}</p>
        <p><b>Duration</b>: {{ $event->duration }} hours</p>
        <p><b>Category</b>: {{ $event->category->title }}</p>
        <p><b>Creation date</b>: {{ $event->created_at }}</p>
        <p><b>Update date</b>: {{ $event->updated_at }}</p>
        <p><b>User ID</b>: {{ $event->user->id }}</p>
        <p><b>User Name</b>: {{ $event->user->name }}</p>

        @if($event->tags->isNotEmpty())
            <p><b>Tags:</b></p>
            <p>
            @foreach($event->tags as $tag)
                {{ $tag->title }}
            @endforeach
            </p>
        @endif

        @if($event->images->isNotEmpty())
            <div>
                <p><b>Images:</b></p>
                @foreach($event->images as $image)
                    <img class="img-thumbnail" src="{{ $image->url }}" style="max-height: 100px; display: inline; margin-left: 20px">
                @endforeach
            </div>
        @endif
        <hr>

        <form action="{{ route('events.destroy', [ $event->id ]) }}" method="post">
            @csrf
            @method('DELETE')
            <a href="{{ route('events.edit', [ $event->id ]) }}" class="btn btn-warning btn-sm">Edit event</a> |

            <button class="btn btn-danger btn-sm">Delete event</button>
        </form>
    </div>
</x-layout.office>
