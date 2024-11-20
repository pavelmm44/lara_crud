<x-layout.public title="Show events list">

    <div class="row">
        <h2 class="text-center">List of events</h2>
        @foreach($events as $event)
            <div class="card ml-6 mb-6" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $event->title }}</h5>
                    <p class="card-text">
                        <p><b>Category</b>: {{ $event->category->title }}</p>
                        <p><b>User ID</b>: {{ $event->user->id }}</p>
                        <p><b>User Name</b>: {{ $event->user->name }}</p>
                        <hr>
                    </p>
                    @can('update-event', $event)
                        <a href="{{ route('events.show', [ $event->id ]) }}" class="btn btn-sm btn-warning text">Show more</a>
                    @endcan
                </div>
            </div>
        @endforeach
    </div>
</x-layout.public>
