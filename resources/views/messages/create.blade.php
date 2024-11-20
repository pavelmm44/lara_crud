<x-layout.office title="Create message">
    <div>
        <h2>Create message</h2>
        <form action="{{ route('messages.store') }}" method="post">
            @csrf
            <x-form.input type="text" label="Title" name="title"/>

            <x-form.textarea label="Content" name="content" rows="3"/>

            <button class="btn btn-primary btn-sm" type="submit">Save</button>
            <button type="button" id="send-valid-btn" class="btn btn-info btn-sm">sendValid</button>
        </form>
        <hr>
    </div>
</x-layout.office>
