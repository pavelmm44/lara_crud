<x-layout.office title="Show messages list">
    <div>
        <a href="{{ route('messages.create') }}" class="btn btn-sm btn-success">Create message</a>
        <hr>
    </div>
    <div class="row">
        <h2 class="text-center">List of messages</h2>
        @foreach($messages as $message)
            <div class="col-md-4 mb-6">
                <div class="card" style="height: 100%; width: 80%">
                    <div class="card-header">
                        {{ $message->title }}
                    </div>

                    <div class="card-body">
                        <p class="card-text">
                            <p><b>Content</b>: {{ $message->content }}</p>
                        </p>

                        @if($message->tags->isNotEmpty())
                            <p><b>Tags:</b></p>
                            <p>
                                @foreach($message->tags as $tag)
                                    {{ $tag->title }}
                                @endforeach
                            </p>
                        @endif
                    </div>

                    <div class="card-footer">
                        <a href="{{ route('messages.show', [ $message->id ]) }}" class="btn btn-sm btn-warning">Show more</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-layout.office>
