<x-layout.office title="Show messages list">
    <div>
        <a href="{{ route('messages.create') }}" class="btn btn-sm btn-success">Create message</a>
        <hr>
    </div>
    <div class="row">
        <h2 class="text-center">List of messages</h2>
        @foreach($messages as $message)
            <div class="card ml-6 mb-6" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $message->title }}</h5>
                    <p class="card-text">
                        <p><b>Title</b>: {{ $message->title }}</p>
                    </p>
                    <hr>
                    <a href="{{ route('messages.show', [ $message->id ]) }}" class="btn btn-sm btn-warning">Show more</a>
                </div>
            </div>
        @endforeach
    </div>
</x-layout.office>
