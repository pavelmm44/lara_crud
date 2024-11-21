<x-layout.office title="Edit message">
    <div>
        <a href="{{ route('messages.show', [$message]) }}" class="btn btn-success btn-sm">Show message</a>
        <hr>
    </div>

    <div>
        <h2>Edit message</h2>
        <form action="{{ route('messages.update', [$message]) }}" method="post">
            @csrf
            @method('PUT')
            <x-form.input type="text" label="Title" name="title" :item="$message"/>

            <x-form.textarea label="Content" name="content" rows="3" :item="$message"/>

            <x-form.select label="Tags" name="tags" :data="$tags" :multiple="true" :item="$message"/>

            <button class="btn btn-primary btn-sm" type="submit">Save</button>
        </form>
        <hr>
    </div>
</x-layout.office>
