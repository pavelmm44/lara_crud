<x-layout.office title="Create image">
    <div>
        <h3>Create image</h3>
        <form action="{{ route('images.store', [$model, $id]) }}" method="post" enctype="multipart/form-data">
            @csrf

            <x-form.input type="file" label="Images" name="image" :is_array="true" :multiple_files="true"/>

            <button class="btn btn-primary btn-sm" type="submit">Save</button>
        </form>
    </div>
    <hr>
</x-layout.office>
