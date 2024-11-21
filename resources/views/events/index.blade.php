<x-layout.office title="Show events list">
    <div>
        <a href="{{ route('events.create') }}" class="btn btn-sm btn-success">Create event</a>
        <hr>
    </div>
    <div class="row">
        <h2 class="text-center">List of events</h2>
        @foreach($events as $event)
            <div class="col-md-4 mb-6">
            <div class="card" style="height: 100%; width: 80%;">
                <div class="card-header">
                    {{ $event->title }}
                </div>
                <div class="card-body">
                    <p class="card-text">
                        <p><b>Category</b>: {{ $event->category->title }}</p>
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

                    </p>
                </div>
                @can('update-event', $event)
                    <div class="card-footer">
                    <a href="{{ route('events.show', [ $event->id ]) }}" class="btn btn-sm btn-warning">Show more</a>
                    </div>
                @endcan
            </div>
            </div>
        @endforeach
    </div>
</x-layout.office>
