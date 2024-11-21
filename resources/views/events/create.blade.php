<x-layout.office title="Create event">
    <div>
        <h3>Create event</h3>
        <form action="{{ route('events.store') }}" method="post">
            @csrf

            <x-form.input type="text" label="Title" name="title"/>

            <x-form.input type="text" label="Url" name="url"/>

            <x-form.input type="datetime-local" label="Start time" name="start_time"/>

            <x-form.input type="text" label="Duration(hours)" name="duration"/>

            <x-form.select label="Category" name="category_id" :data="$categories"/>

            <x-form.select label="Tags" name="tags" :data="$tags" :multiple="true"/>

            <button class="btn btn-primary btn-sm" type="submit">Save</button>
        </form>
    </div>
    <hr>
</x-layout.office>
