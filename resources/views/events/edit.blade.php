<x-layout.office title="Edit event">
    <div>
        <a href="{{ route('events.show', [ $event->id ]) }}" class="btn btn-success btn-sm">Show event</a>
        <hr>
    </div>

    <div>
        <h3>Edit event</h3>
        <form action="{{ route('events.update', [ $event->id ]) }}" method="post">
            @csrf
            @method('PUT')
            <x-form.input type="text" label="Title" name="title" :item="$event"/>

            <x-form.input type="text" label="Url" name="url" :item="$event"/>

            <x-form.input type="datetime-local" label="Start time" name="start_time" :item="$event"/>

            <x-form.input type="text" label="Duration(hours)" name="duration" :item="$event"/>

            <x-form.select label="Category" name="category_id" :data="$categories" :item="$event"/>

            <x-form.select label="Tags" name="tags" :multiple="true" :data="$tags" :item="$event"/>

            <button type="submit" class="btn btn-primary btn-sm">Save</button>
        </form>
    </div>
    <hr>
</x-layout.office>
