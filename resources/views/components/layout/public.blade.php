@props([
    'title' => 'Public'
])

<x-layout.default :title="$title">

    <div class="row">
        <div class="col-3">
            <x-menus.public />
        </div>
        <div class="col-9">
            {{ $slot }}
        </div>
    </div>

</x-layout.default>
